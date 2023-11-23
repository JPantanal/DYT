<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

import EventModal from '/resources/js/Components/Modals/EventModal.vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import interactionPlugin from '@fullcalendar/interaction';
import {Head} from "@inertiajs/vue3";

export default {
         name: 'Calendar',
    components:
        {
            Head,
            EventModal,
            AuthenticatedLayout,
            FullCalendar // make the <FullCalendar> tag available
        },
        data: function() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin,timeGridPlugin, interactionPlugin ],
                initialView: 'timeGridWeek',
                weekends: true,
                dateClick: this.handleDateClick,
                select: this.handleSelect,
                events: [
                    { title: 'Meeting', start: new Date() }
                ],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth timeGridWeek timeGridDay'
                },
            },
            showModal: false,
            CalenderBeginTime: 'asd',
            CalenderEndTime:'',
        }
    },
    methods:{
        handleDateClick: function(arg){
            this.CalenderBeginTime = arg.date.toISOString().slice(0,16);
            //add 1 hour
            var addhour = new Date();
            addhour.setTime((arg.date.getTime()+ 60 * 60 * 1000));
            this.CalenderEndTime = addhour.toISOString().slice(0,16) //add 1 hour to time
            this.showModal = true;
        },

        handleSelect: function(arg){
            alert( "was selected")
        }
    }
}
</script>
    <template>
        <Head title="DYTutoring Scheduling" />
        <Teleport to="body">
            <!-- use the modal component, pass in the prop -->
            <EventModal :show="showModal" @close="showModal = false" :begin="CalenderBeginTime"  :end="CalenderEndTime" >
                <template #header>
                    <h3>Schedule Tutoring Session</h3>
                </template>
                <template v-slot:beginTime>
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
            <h1>Demo App</h1>
            <FullCalendar :options='calendarOptions' ref="modal"/>
        </div>

        </authenticated-layout>
    </template>
<style scoped>

</style>
