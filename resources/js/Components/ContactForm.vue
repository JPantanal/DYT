<script setup>
import { ref, nextTick } from 'vue';

const showForm = ref(false);
const formSection = ref(null);

const form = ref({
  name: '',
  email: '',
  message: ''
});

function openEmailClient() {
  console.log('Sending email:', form.value);
}

function toggleForm() {
  showForm.value = !showForm.value;

  if (showForm.value) {
    nextTick(() => {
      formSection.value?.scrollIntoView({ behavior: 'smooth' });
    });
  }
}


</script>


<template>
  <div class="formz-background">

    <div class="flex items-center justify-center">
      <button @click="toggleForm" class="formz-title">Contact Us</button>
    </div>

    <div ref="formSection" v-if="showForm" class="formz bg-lime-400">
      <h2></h2>
      <form @submit.prevent="openEmailClient">
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="form.name" required />
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="form.email" required />
        </div>
        <div>
          <label for="message">Message:</label>
          <textarea id="message" v-model="form.message" rows="5" required></textarea>
        </div>
        <button type="submit">Send Email</button>
      </form>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        message: ''
      }
    };
  },
  methods: {
    openEmailClient() {
      const subject = encodeURIComponent('Contact Form Submission');
      const body = encodeURIComponent(`Name: ${this.form.name}\nEmail: ${this.form.email}\nMessage: ${this.form.message}`);
      const mailtoLink = `mailto:mydaytontutoring@gmail.com?subject=${subject}&body=${body}`;
      window.location.href = mailtoLink;
    }
  }
};
</script>

<style scoped></style>