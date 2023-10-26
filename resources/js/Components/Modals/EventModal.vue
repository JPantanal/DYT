<script>
import {router, useForm} from '@inertiajs/vue3'
import { reactive } from 'vue'

export default {
    props: {
        show: Boolean,
    },
    data(){
        return{
            form: useForm ({
                title: null,
                beginDateTime: null,
                endDateTime:null,
                status:1
            }),
        }
    },
}
</script>

<template>
    <Transition name="modal">
        <div v-if="show" class="modal-mask">
            <div class="modal-container">
                <form @submit.prevent="form.post('/schedule-tutoring')">
                <div class="modal-header">
                        <slot name="header">Modal Header</slot>
                    </div>
                    <div class="modal-body">
                            <div>
                             <slot name="beginTime"><label>Begin Time</label> <input type="datetime-local" v-model="form.beginDateTime"> </slot>
                            </div>
                            <div>
                               <slot name="endTime">
                                   <label for="endDateTime">End Time</label> <input type="datetime-local"  v-model="form.endDateTime" >
                                   <div v-if="endDateTime===null"> You need to put an end date. </div>
                               </slot>
                            </div>
                            <div>
                                <label>Is there anything you would like to add</label> <textarea id ="myTextArea" rows="4" cols="23"> </textarea>
                            </div>
                    </div>
                     <div class="modal-footer">
                            <button class="modal-test-button  hover:text-gray-900" type="submit" :disabled="form.processing">Submit</button>
                            <button class="modal-default-button hover:text-gray-900"  type ="button" @click="$emit('close')"> Cancel</button>
                    </div>
            </form>
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
    width: 300px;
    margin: auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
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
