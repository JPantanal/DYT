<template>
  <div class="contact-form">
    <h2>Contact Us</h2>
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
      const mailtoLink = `mailto:your-email@example.com?subject=${subject}&body=${body}`;
      window.location.href = mailtoLink;
    }
  }
};
</script>

<style scoped>
.contact-form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  font-family: Arial, sans-serif;
}

.contact-form h2 {
  text-align: center;
  margin-bottom: 20px;
}

.contact-form input,
.contact-form textarea,
.contact-form button {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.contact-form button {
  background-color: #007bff;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

.contact-form button:hover {
  background-color: #0056b3;
}
</style>