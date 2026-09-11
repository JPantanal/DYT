<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    laravelVersion: { type: String, required: true },
    canRegister: { type: Boolean, default: true },
    phpVersion: { type: String, required: true },
});
</script>

<template>

    <Head title="Dayton Tutoring" />

    <GuestLayout>

        <!-- HERO SECTION -->
        <section class="hero">
            <div class="hero-content">
                <h1 class="hero-title">Dayton Tutoring</h1>
                <p class="hero-subtitle ">
                    Personalized tutoring for students of all ages — online or in person.
                </p>
            </div>
        </section>

        <!-- INTRO SECTION -->
        <section class="intro">
            <p>
                Dayton Tutoring is a locally owned service based in Dayton, Ohio, offering both online and
                in-person tutoring tailored to your unique learning needs. Whether you're a grade schooler
                struggling with homework or a high school student preparing for AP, ACT, or SAT exams, we're
                here to help you reach your goals.
            </p>

            <p>
                Our tutors are experienced professionals and trained educators committed to delivering results
                with patience, expertise, and care. We create a supportive environment tailored to all ages and
                learning styles, helping students build confidence and celebrate every success.
            </p>
        </section>

        <!-- TUTOR PROFILE SECTION -->
        <section class="profile ">
            <img src="jaguarundi.jpeg" alt="Tutor1" class="profile-image">

            <div class="profile-text TestBackground">
                <h2 class="profile-name">Holly Lewis</h2>

                <p>
                    I received a B.A. in Early Childhood Education from Cedarville University in 2016 and a JD
                    from the University of Dayton School of Law in 2021. I am currently training to become an
                    Orton Gillingham instructor.
                </p>

                <p>
                    I have been tutoring students since 2013, working with learners from kindergarten through
                    ACT preparation. Most of my experience is with elementary students, and I was designated a
                    Top 20% Wyzant tutor in 2020. I tailor each lesson to the student's individual needs,
                    ensuring sessions are both effective and enjoyable.
                </p>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="cta">
            <a href="/events" class="cta-button">
                Empower Your Student’s Success — Schedule a Session Today
            </a>
        </section>

    </GuestLayout>
</template>

<style>
/* GENERAL */
section {
    margin: auto;
    max-width: 900px;
    padding: 0 20px;
    line-height: 1.6;
}

/* HERO */
.hero {
    text-align: center;
    padding: 0px 10px 10px;
}

.hero-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.hero-subtitle {
    font-size: 1.5rem;
    color: #444;
}

/* INTRO */
.intro p {
    margin-bottom: 20px;
    max-width: 700px;
    font-size: 1.3rem;


}

/* PROFILE SECTION */
.profile {
    display: flex;
    align-items: flex-start;
    gap: 30px;
    margin-top: 60px;
    font-size: 1.3rem;
}

.profile-image {
    width: 260px;
    border-radius: 8px;
    padding: 8px 5px 5px
}

.profile-text {
    max-width: 600px;
    padding: 9px
}

.profile-name {
    font-size: 1.6rem;
    font-weight: bold;
    margin-bottom: 10px;
}

/* CTA */
.cta {
    text-align: center;
    margin-top: 60px;
}

.cta-button {
    padding: 14px 28px;
    background-color: #1e73be;
    color: white;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
}

.cta-button:hover {
    background-color: #155a8f;
}

/* MOBILE */
@media (max-width: 768px) {
    .profile {
        flex-direction: column;
        text-align: center;
    }

    .profile-text {
        text-align: left;
    }
}
</style>
