<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

import Modal from '/resources/js/Components/Modals/EventModal.vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import interactionPlugin from '@fullcalendar/interaction';

export default {
        name: "Calendar",
    components: {
        Modal,
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
            CalenderBeginTime: '',
            endTime: null,
        }
    },
    methods:{
        handleDateClick: function(arg){
            this.CalenderBeginTime= arg.date.toISOString().slice(0,16)
            this.showModal = true;
        },

        handleSelect: function(arg){
            alert( "was selected")
        }
    }
}
</script>

    <template>
        <Teleport to="body">
            <!-- use the modal component, pass in the prop -->
            <modal :show="showModal" @close="showModal = false">
                <template #header>
                    <h3>Schedule Tutoring Session</h3>
                </template>
                <template v-slot:beginDateTime>
                    <label for="beginDateTime">Begin Time</label>
                    <input id="beginDateTime" type ="datetime-local" v-model="CalenderBeginTime" >
                </template>
            </modal>
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
