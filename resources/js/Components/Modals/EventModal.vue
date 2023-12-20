<script>
import {router, useForm} from '@inertiajs/vue3'
import TextInput from "@/Components/TextInput.vue";
import { ref } from 'vue';



export default {
    components: {TextInput},
    props: {
        show: Boolean,
        begin: {
            type: String
        },
        end: {
            type: String
        },
        eventStatus: {
            type: Number
        },
        eventid: null,
        notes: null,
    },
    data(){
        return{ // Create a local copy of the form data
            form:useForm({
                title: null,
                LocalBeginDateTime: null,
                LocalEndDateTime: null,
                status:0,
                appointmentInfo: null,
                eventID: null,
                customClient:null,
                clientID: this.$page.props.auth.user.id,
                tutorID: null,
            }),
            userRole: '0',
            type: 'Availibility',
        }
    },
    computed: {
        isTutor()
        {
            return this.$page.props.auth.user.role === 1;
        }
    },
    emits: ['close'],
    watch: {
        // Watch for changes in the prop value and update  accordingly
        begin(newValue) {
            this.form.LocalBeginDateTime= newValue;
        },
        end(newValue){
            this.form.LocalEndDateTime = newValue;
        },
        eventid(newValue){
            this.form.eventID = newValue;
        },
        eventStatus(newValue){
            this.form.status = newValue;
        },
        notes(newValue){
            this.form.appointmentInfo = newValue;
        }
    },
    methods: {
        handleSubmit(){
            if(this.form.eventID== null)
            {
                if(this.form.status == 0){
                    this.form.status = 1;
                }
                router.post('/tutoring/store', this.form, {preserveState: false });
            }
            else{
                router.post('/tutoring/update' , this.form, {preserveState: false });
            }
        },
         closeOnEscape(keyboardEvent) {
            if (keyboardEvent.key === 'Escape' && this.show) {
                this.close();
            }
        },
        close(){
            this.$emit('close');
        },
        beforeSubmit(newValue) {
            this.form.status = newValue;
            this.handleSubmit();
        },
    },
    mounted() {
        document.addEventListener('keydown', this.closeOnEscape);
    },
    beforeUnmount() {
        window.removeEventListener('keydown', this.closeOnEscape);
    },
}

</script>

<template>
    <Transition name="modal">
        <div v-if="show" class="modal-mask" >
            <div class="modal-container"  >
                <form @submit.prevent="handleSubmit" >
                    <button class="modal-close"  type ="button"  @click="$emit('close')" >X</button>
                    <div class="modal-header">
                        <slot name="header">Modal Header</slot>
                    </div>
                    <div class="modal-body">
                        <div v-if="isTutor">
                            <p>Type</p>
                            <select v-model="type">
                                <option value="Availibility">Unavailable</option>
                                <option value="Scheduling">Scheduling</option>
                            </select>
                        </div>
                            <div>
                             <slot name="beginTime" > <label>Begin Time</label>
                                 <input type="datetime-local"  v-model="form.LocalBeginDateTime" >
                             </slot>
                            </div>
                            <div>
                               <slot name="endTime" >
                                   <label for="endDateTime">End Time</label>
                                   <input type="datetime-local" v-model="form.LocalEndDateTime" >
                                   <div v-if="endDateTime===null"> You need to put an end date. </div>
                               </slot>
                            </div>
                            <div>
                                <label>Notes</label>
                                <textarea id ="myTextArea" rows="4" cols="23" v-model="form.appointmentInfo"> </textarea>
                            </div>
                        <div v-if="form.status === 0 && !isTutor">
                            <label>Status: Unsent</label>
                            <div class="modal-footer">
                                <button v-if="form.eventid==null" class="modal-test-button hover:text-gray-900"  type="submit" :disabled="form.processing">Submit</button>
                                <button v-else class="modal-test-button  hover:text-gray-900"   type="submit" :disabled="form.processing">Submit</button>
                                <button class="modal-default-button hover:text-gray-900"  type ="button" @click="$emit('close')"> Close</button>
                            </div>
                        </div>
                        <div v-if="form.status === 0 && isTutor && type=='Availibility'">    <!--TODO: buttons show up for certain areas could get confusing with combinations -->
                            <label class="status-field">Status: Unsent</label>
                            <div class="modal-footer ">
                                <button class="modal-test-button hover:text-gray-900" type="button" @click="beforeSubmit(4)" :disabled="form.processing">Submit</button>
                                <button class="modal-default-button hover:text-gray-900 button-right" type="button" @click="$emit('close')" :disabled="form.processing">Cancel</button>
                            </div>
                        </div>
                        <div v-else-if="form.status === 0 && isTutor && type=='Scheduling'">
                            <label class="status-field">Status: Unsent</label>
                             <div>
                                 <label class="status-field">Client: {{}}</label><!--Not working right-->
                                 <input type="text" v-model="form.customClient" required>
                             </div>                                               <!--TODO: schedule with other clients, custom name, search for client-->
                            <div class="modal-footer ">
                                <button class="modal-test-button hover:text-gray-900" type="button" @click="beforeSubmit(2)" :disabled="form.processing">Submit</button>
                                <button class="modal-default-button hover:text-gray-900 button-right" type="button" @click="$emit('close')" :disabled="form.processing">Cancel</button>
                            </div>
                        </div>
                        <div v-if="form.status === 1 && isTutor">    <!--TODO: buttons show up for certain areas could get confusing with combinations -->
                            <label class="status-field">Status: Pending</label>
                            <div class="modal-footer ">
                                <button class="modal-test-button hover:text-gray-900" type="button" @click="beforeSubmit(2)" :disabled="form.processing">Approve</button>
                                <button class="modal-default-button hover:text-gray-900 button-right" type="button" @click="beforeSubmit(3)" :disabled="form.processing">Deny</button>
                            </div>
                        </div>
                        <div v-if="form.status === 1 && !isTutor">
                        <label class="status-field">Status: Pending</label>
                            <div class="modal-footer ">
                                <button class="modal-test-button hover:text-gray-900" type="button" @click="beforeSubmit(1)" :disabled="form.processing">Update</button>
                                <button class="modal-default-button hover:text-gray-900 button-right" type="button" @click="beforeSubmit(3)" :disabled="form.processing">Cancel Pending Session  </button>
                            </div>
                        </div>
                        <div v-if="form.status === 2">
                            <label>Status: Scheduled</label>
                            <div class="modal-footer">
                                <button class="modal-test-button  hover:text-gray-900" type="button" @click="beforeSubmit(3)" :disabled="form.processing">Cancel Meeting</button><button class="modal-default-button hover:text-gray-900"  type ="button" @click="$emit('close')"> Close</button>
                            </div>
                        </div>
                        <div v-if="form.status === 3">
                            <label>Status: Canceled</label>
                                <div class="modal-footer">
                                <label>Tutoring is Cancelled, if you would like to make a new appointment please re-schedule</label>
                                <button class="modal-default-button hover:text-gray-900  "  type ="button" @click="$emit('close')"> Close</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div v-if="this.$page.props.flash.error" class="alert">
                    {{ $page.props.errors}}
                </div>

            </div>
        </div>

    </Transition>
</template>

<style>


.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    transition: opacity 0.3s ease;
}

.modal-container {
    width: 320px;
    margin: auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    position: relative;

}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
    background: linear-gradient( grey 2.16%, grey 90.72%);
    display: inline-block;
    outline: 0;
    border: 0;
    cursor: pointer;
    color: #fff;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    height: 30px;
    min-width: 60px;
}

.modal-default-sucess-button{
    color:#42b4b9
}


.modal-test-button{
    display: inline-block;
    outline: 0;
    border: 0;
    cursor: pointer;
    color: #fff;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    height: 30px;
    padding: 0px 15px;
    text-shadow: black 0px 3px 8px;
    background: linear-gradient(92.88deg, #42b4b9 9.16%, #42b4b9 43.89%, #42b983 64.72%);
    transition: all 0.5s ease 0s;

}
.modal-close {
    /* Styles for the close button */
    position: absolute;
    right:0;
    top:0;
    border: none;
    background: grey;
    cursor: pointer;
    font-size: 20px; /* Adjust as needed */
    padding-right: 5px;
    padding-left: 7px;
}

.modal-footer{
    padding-top: 10px;
    position:relative;
    bottom: 0px;
}
.down-padding{
    padding-bottom: 5px;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *-->
    :hover{
        box-shadow: black 0px 3px 40px;
        transition: all 0.1s ease 0s;
    }

 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from {
    opacity: 0;
}

.modal-leave-to {
    opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
