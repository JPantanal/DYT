<template>
    <section class="testimonials formz-centering">
        <button @click="toggleForm" class="formz-title">What Our Students Say or Testimonials </button>
        <div class="testimonial-list formz-background" v-if="showForm">
            <article v-for="(t, index) in testimonials" :key="index" class="testimonial-card">
                <p class="quote">"{{ t.quote }}"</p>
                <div class="student-info">
                    <strong class="name">{{ t.name }}</strong>
                    <span class="subject">{{ t.subject }}</span>
                </div>
            </article>
        </div>

    </section>
</template>

<script>
import { ref, nextTick } from 'vue';

export default {
    name: "Testimonials",

    data() {
        return {
            showForm: false,
            testimonials: [
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
                }
            ]
        };
    },

    methods: {
        async toggleForm() {
            this.showForm = !this.showForm;
            if (this.showForm) {
                await nextTick();
                this.$refs.formSection?.scrollIntoView({ behavior: "smooth" });
            }
        }
    }
};
</script>


<style scoped>
.testimonials {
    padding: 2rem;
    background: #f7f9fc;
    border-radius: 12px;
}

.title {
    text-align: center;
    margin-bottom: 1.5rem;
    font-size: 1.8rem;
    font-weight: 700;
}

.testimonial-list {
    display: grid;
    gap: 1.5rem;
}

.testimonial-card {
    background: white;
    padding: 1.25rem;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}

.quote {
    font-style: italic;
    margin-bottom: 0.75rem;
}

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