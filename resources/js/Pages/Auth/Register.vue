<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
<template>
    <GuestLayout>

        <Head title="Register" />

        <form @submit.prevent="submit" class="register-form">

            <!-- Name -->
            <div class="form-group">
                <InputLabel for="name" value="Name" />

                <TextInput id="name" type="text" v-model="form.name" required autofocus autocomplete="name"
                    class="input" />

                <InputError :message="form.errors.name" class="input-error" />
            </div>

            <!-- Email -->
            <div class="form-group">
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" v-model="form.email" required autocomplete="username"
                    class="input" />

                <InputError :message="form.errors.email" class="input-error" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" v-model="form.password" required autocomplete="new-password"
                    class="input" />

                <InputError :message="form.errors.password" class="input-error" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required
                    autocomplete="new-password" class="input" />

                <InputError :message="form.errors.password_confirmation" class="input-error" />
            </div>

            <!-- Actions -->
            <div class="actions">
                <Link :href="route('login')" class="login-link">
                    Already registered?
                </Link>

                <PrimaryButton :disabled="form.processing" :class="{ 'disabled': form.processing }"
                    class="primary-button">
                    Register
                </PrimaryButton>
            </div>

        </form>
    </GuestLayout>
</template>

<style>
/* Form container */
.register-form {
    max-width: 450px;
    margin: 0 auto;
}

/* Form group spacing */
.form-group {
    margin-bottom: 20px;
}

/* Inputs */
.input {
    display: block;
    width: 100%;
    margin-top: 6px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
}

.input:focus {
    border-color: #4a67ff;
    outline: none;
}

/* Error messages */
.input-error {
    margin-top: 6px;
    font-size: 13px;
    color: #e53e3e;
}

/* Actions row */
.actions {
    margin-top: 24px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 16px;
}

/* Login link */
.login-link {
    font-size: 14px;
    color: #666;
    text-decoration: underline;
}

.login-link:hover {
    color: #000;
}

/* Primary button */
.primary-button {
    background: #4a67ff;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 15px;
}

.primary-button:hover {
    background: #3b55d6;
}

.primary-button.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
