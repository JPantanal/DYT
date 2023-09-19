<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import interactionPlugin from '@fullcalendar/interaction';

export default {
        name: "Calendar",
    components: {
        AuthenticatedLayout,
        FullCalendar // make the <FullCalendar> tag available
    },
    data: function() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin,timeGridPlugin, interactionPlugin ],
                initialView: 'dayGridMonth',
                weekends: true,
                dateClick: this.handleDateClick,
                events: [
                    { title: 'Meeting', start: new Date() }
                ],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth timeGridWeek timeGridDay'
                }
            }
        }
    },
    methods:{
        handleDateCLick: function(arg){
            alert(arg.dateStr + 'was clicked!!')
        }

    }
}
</script>

    <template>
        <authenticated-layout>
        <div>
            <h1>Demo App</h1>
            <FullCalendar :options='calendarOptions' />
        </div>
        </authenticated-layout>
    </template>
<style scoped>

</style>
