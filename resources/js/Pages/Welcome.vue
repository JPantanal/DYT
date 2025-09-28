<script setup>

import { Head, Link } from '@inertiajs/vue3';
import image from "../Components/images/Jaguarundi.jpg";
import FormFile from '@/Components/ContactForm.vue';
import HeaderFile from '@/Components/Header.vue';

defineProps({
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Dayton Tutoring" />
    <HeaderFile/>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-300 ">
        <div class="max-w-7xl p-6 lg:p-8 bg-purple-700">
            <div class="flex justify-center ">
                <div class="text-3xl">Dayton Tutoring</div>
                 
            </div>
            <p class = "py-1 max-w-lg ">
                Dayton Tutoring is a locally owned service based in Dayton, Ohio, offering both online and in-person tutoring tailored to your unique 
                learning needs. Whether you're a grade schooler struggling with homework or a high school student preparing for AP, ACT, or SAT exams, 
                we're here to help you reach your goals. Our tutors are experienced professionals and trained educators committed to delivering results 
                with patience, expertise, and care.
            </p>
            <p class="py-1 max-w-lg">
                Discover Dayton’s premier tutoring service, where academic excellence meets personalized instruction. 
                Our passionate educators are committed to empowering students throughout Dayton, Ohio, with the skills and 
                confidence to thrive. Whether you're tackling math, science, or language arts, we create a supportive
               environment tailored to all ages and learning styles. With proven 
                strategies and a results-driven approach, we help students reach their goals and celebrate every success
            </p>
            <div class="px-3 py-3">
                <img src="jaguarundi.jpeg" width="300"  alt="Tutor1" class="flex-justify-center">
                <p class="text-center">
                    Holly Lewis
                </p>
            </div>

            <div class ="px-3 py-0 ">
                <p class = "py-1 max-w-lg">
                    I recieved a B.A. in Early Childhood Education from Cedarville University in 2016 and a JD from the University of Dayton School of Law
                    in 2021. I am also a currently in training to become an Orton Gillingham instructor.
                </p>
                <p class = "py-1 max-w-lg ">
                    I have been tutoring students since 2013. My tutoring experience has ranged from kindergarten preparation all the way to ACT preparation;
                    however most of my experience has been with elementary students. I was designated a Top 20% Wyzant tutor for 2020 with 80% of my lessons
                    teaching elementary students. I tailor my lessons to the student's individual needs, making sure that they are not only effective but also
                    enjoyable.
                </p>
            </div>
        </div>
      
    </div>
      <FormFile /> 
</template>

<style>
.bg-dots-darker {
    background-image: url("1 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}


</style>
