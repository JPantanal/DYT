<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

import EventModal from '/resources/js/Components/Modals/EventModal.vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import interactionPlugin from '@fullcalendar/interaction';
import {Head} from "@inertiajs/vue3";
import {router} from '@inertiajs/vue3'

import GetEventsFromDatabase from "../../Components/EventComponents/GetEventsFromDatabase.vue";

let getColorForStatus;
export default {
         name: 'Calendar',
    components:
        {
            Head,
            EventModal,
            AuthenticatedLayout,
            FullCalendar, // make the <FullCalendar> tag available
            GetEventsFromDatabase
        },
        data: function() {
        return {
            calendarOptions: {
                contentHeight: 'auto',
                timeZone:'UTC',
                plugins: [dayGridPlugin,timeGridPlugin, interactionPlugin ],
                initialView: 'timeGridWeek',
                weekends: true,
                slotMinTime: "6:00:00",
                slotMaxTime: "22:00:00",
                slotDuration: '0:30:00',
                allDaySlot: false,
                dateClick: this.handleDateClick,
                eventClick: this.handleEventClick,
                customButtons: {
                    NextTutor: {
                        text: 'Next Tutor',
                        click: function() {
                            this.loadCalendarEvents('NextUser');
                            alert('clicked the custom button!');
                        },
                        next: 'chevron-right',
                    },
                    PrevTutor: {
                        text: 'Prev Tutor',
                        click: function() {
                            loadCalendarEvents('NextUser');
                        },
                        next: 'chevron-right',
                    }
                },
                events: [
                    {
                        title: null,
                        start: null,
                        end: null,
                        extendedProps: {
                            client_id: null,
                            created_at: null,
                            status: null,
                            tutor_id: null,
                            updated_at:null,
                            notes: null
                        }
                    }
                ],
                headerToolbar: {
                    left: 'prev,next today PrevTutor NextTutor',
                    center: 'title',
                    right: 'dayGridMonth timeGridWeek timeGridDay'
                },
            },
            showModal: false,
            CalenderBeginTime: null,
            CalenderEndTime: null,
            ParentEventId:null,
            ParentEventStatus: null,
            ParentNotes: null
        }
    },
    methods:{
        handleDateClick: function(arg){
        this.CalenderBeginTime = arg.date.toISOString().slice(0,16);
            var addHour = new Date(arg.date);  //add 1 hour
            addHour.setHours(addHour.getHours()+1);
            this.CalenderEndTime = addHour.toISOString().slice(0,16);
            this.ParentNotes = null;
            this.ParentEventId = null;
            this.ParentEventStatus = 0; //unsent
            this.showModal = true;
        },
        handleEventsFetched(fetchedEvents) {
            fetchedEvents = fetchedEvents.map(event => ({...event,
                color: this.getColorForStatus(event.status)
            }));
            this.calendarOptions.events = fetchedEvents;
        },
         getColorForStatus (status) {
              switch (status) {
                  case 0:
                      return 'black'; //unsent if you see a grey even there is a problem,
                  case 1:
                      return '#42b4b9'; //Pending
                  case 2:  //Scheduled
                      return 'green';
                  case 3:
                      return 'gray'; //canceled
                  case 4:
                      return 'gray'; //bacgkround busy
                      default:
                      return 'purple'; // Default color
              }
        },

        handleEventClick(arg){
            // open modal with data set.
            this.CalenderBeginTime = arg.event._instance.range.start.toISOString().slice(0,16);// arg.event.startStr.slice(0,16);
            this.CalenderEndTime = arg.event._instance.range.end.toISOString().slice(0,16);   //arg.event.endStr.slice(0,16);
            this.ParentNotes = arg.event.extendedProps.notes
            this.ParentEventId = arg.event.id;
            this.ParentEventStatus = arg.event.extendedProps.status;
            this.showModal = true;
        },
        eventClick(info) {
            alert('Event: ' + info.event.title);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('View: ' + info.view.type);
        },
        checkUserRole(){
            router.get('/tutoring/update');
        },
        loadCalendarEvents(){
        }
    }
}
</script>
    <template>
        <Head title="DYTutoring Scheduling" />
        <Teleport to="body">
            <!-- use the eventModal component, pass in the prop -->
            <EventModal  :show="showModal" @close="showModal = false" :begin="CalenderBeginTime" :end="CalenderEndTime" :eventid="ParentEventId"
                         :eventStatus="ParentEventStatus"  :notes="ParentNotes">
                <template #header>
                    <h3>Schedule Tutoring Session</h3>
                </template>
                <template v-slot:beginTime="beginDateTime">
                    <label for="beginDateTime">Begin Time</label>
                    <input id="beginDateTime" type ="datetime-local" v-model="CalenderBeginTime" >
                </template>
                <template v-slot:endTime ="endDateTime">
                    <label for="endDateTime">End Time</label>
                    <input id="endDateTime" type ="datetime-local" v-model="CalenderEndTime" >
                </template>
            </EventModal>
        </Teleport>

        <authenticated-layout>
        <div>
            <h1>Dayton Tutoring</h1>
            <GetEventsFromDatabase @events-fetched="handleEventsFetched" />
            <FullCalendar :options='calendarOptions' ref="modal">
            </FullCalendar>
        </div>
        </authenticated-layout>
    </template>
<style>

.fc-event:hover {
    cursor: pointer; /* Change to your preferred cursor style */
}
</style>
