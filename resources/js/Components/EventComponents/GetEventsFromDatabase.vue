<script>
export default {
    name: "GetEventsFromDatabase",

    data(){
        return{
            events:[]
        }
    },
    methods: {
        fetchEvents() {
            fetch('/events/usersevents')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error fetching events');
                    }
                    return response.json();
                })
                .then(events => {
                    this.events = events;
                    this.$emit('events-fetched', this.events); // Emit an event with the fetched data
                })
                .catch(error => {
                    console.error(error);
                });

        }
    },
    created() {
        this.fetchEvents();
    }
}

</script>

<template>
</template>

<style scoped>
</style>
