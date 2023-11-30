<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

import EventModal from '/resources/js/Components/Modals/EventModal.vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import interactionPlugin from '@fullcalendar/interaction';
import {Head} from "@inertiajs/vue3";
//import GetEventsFromDatabase from '/resources/js/Components/EventComponents/GetEventsFromDatabase.vue'
import {router, useForm} from '@inertiajs/vue3'

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
                dateClick: this.handleDateClick,
                select: this.handleSelect,
                //selectable: this.handleEventSelect,
                eventClick: this.handleEventClick,
                events: [
                    {
                        title: 'Meeting',
                        start: new Date(),
                        extendedProps: {
                            client_id: null,
                            created_at: null,
                            status: null,
                            tutor_id: null,
                            updated_at:null
                        }
                    }
                ],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth timeGridWeek timeGridDay'
                },

            },
            showModal: false,
            CalenderBeginTime: '',
            CalenderEndTime:'',
            ParentEventId:null,
            ParentEventStatus: null
        }
    },
    methods:{
        handleDateClick: function(arg){
            this.CalenderBeginTime = arg.date.toISOString().slice(0,16);
            //add 1 hour
            var addHour = new Date(arg.date);
            addHour.setHours(addHour.getHours()+1);
            this.CalenderEndTime = addHour.toISOString().slice(0,16);

            this.ParentEventId = null;
            this.ParentEventStatus = 0;
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
                      return 'green';
                  case 1:
                      return '#42b4b9';
                  case 2:
                      return 'green';

                  case 3: //canceled
                      return 'gray';
                  default:
                      return 'purple'; // Default color
              }
        },

        handleEventClick(arg){
            // open modal with data set.
            this.CalenderBeginTime = arg.event.startStr.slice(0,16);
            this.CalenderEndTime = arg.event.endStr.slice(0,16);
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
        }
    }
}
</script>
    <template>
        <Head title="DYTutoring Scheduling" />
        <Teleport to="body">
            <!-- use the modal component, pass in the prop -->
            <EventModal  :show="showModal" @close="showModal = false" :begin="CalenderBeginTime"  :end="CalenderEndTime" :eventid="ParentEventId"
                         :eventStatus="ParentEventStatus" >
                <template #header>
                    <h3>Schedule Tutoring Session</h3>
                </template>
                <template v-slot:beginTime="beginDateTime">
                    <label for="beginDateTime">Begin Time</label>
                    <input id="beginDateTime" type ="datetime-local" v-model="CalenderBeginTime" >
                </template>
                <template v-slot:endTime>
                    <label for="endDateTime">Begin Time</label>
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
<style scoped>
</style>
