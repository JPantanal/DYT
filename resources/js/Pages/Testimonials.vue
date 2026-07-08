<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const testimonials = ref([
    {
        name: "Ava M.",
        subject: "Algebra II",
        quote:
            "My tutor helped me raise my grade from a C to an A. I finally understand the concepts!"
    },
    {
        name: "Daniel R.",
        subject: "Physics",
        quote:
            "The explanations were clear and patient. I feel confident going into exams now."
    },
    {
        name: "Sophia L.",
        subject: "SAT Prep",
        quote:
            "My score jumped 180 points. The strategies made all the difference."
    },

    {
        name: "Sophia L.",
        subject: "SAT Prep",
        quote:
            "My score jumped 180 points. The strategies made all the difference."
    },
       {
        name: "Jebediah Jeba",
        subject: "Music Theory",
        quote:
            "My son in law is finally passing."
    },
       {
        name: "Jabbah Inda Hut",
        subject: "Music Theory",
        quote:
            "i killed my pet parrot by accident"
    },
    {
        name: "Jebediah Jeba",
        subject: "Music Theory",
        quote:
            "My son in law is finally passing."
    },
    {
        name: "Sophia L.",
        subject: "Math Class",
        quote:
            "I finally passed a calculus exam with a C+  Thank you DYT Tutoring"
    }

]);
</script>

<template>
  <GuestLayout>
    <Head title="Testimonials" />
        <section class="testimonials">
            <div class="page-header ">
            What Our Students Say
        </div>
            <div class="testimonial-list">
                <article v-for="(t, index) in testimonials" :key="index" class="testimonial-card">
                    <p class="quote">"{{ t.quote }}"</p>

                    <div class="student-info">
                        <strong class="name">{{ t.name }}</strong>
                        <span class="subject">{{ t.subject }}</span>
                    </div>
                </article>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
/* Page header */
.page-header {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    margin: 2rem auto 1rem;
    position:relative;
    width:100%;
}

/* Section wrapper */
.testimonials {
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem;
    background: #f7f9fc;
    border-radius: 12px;

}

/* Grid layout */
.testimonial-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1.5rem;
}

/* Cards */
.testimonial-card {
    background: white;
    padding: 1.25rem;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}

/* Quote text */
.quote {
    font-style: italic;
    margin-bottom: 0.75rem;
}

/* Student info */
.student-info {
    display: flex;
    flex-direction: column;
    font-size: 0.9rem;
}

.name {
    font-weight: 600;
}

.subject {
    color: #666;
}
</style>
