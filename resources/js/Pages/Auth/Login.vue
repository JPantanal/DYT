<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <div v-if="status" class="status-message">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="login-form">

            <!-- Email -->
            <div class="form-group">
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username"
                    class="input" />

                <InputError :message="form.errors.email" class="input-error" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" v-model="form.password" required
                    autocomplete="current-password" class="input" />

                <InputError :message="form.errors.password" class="input-error" />
            </div>

            <!-- Remember Me -->
            <div class="checkbox-group">
                <label class="checkbox-label">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span>Remember me</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="actions">
                <Link v-if="canResetPassword" :href="route('password.request')" class="forgot-link">
                    Forgot your password?
                </Link>

                <PrimaryButton :disabled="form.processing" :class="{ 'disabled': form.processing }"
                    class="primary-button">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<style>
/* Container */
.login-form {
    max-width: 400px;
    margin: 0 auto;
}

/* Status message */
.status-message {
    margin-bottom: 16px;
    font-weight: 500;
    font-size: 14px;
    color: #2f855a;
}

/* Form groups */
.form-group {
    margin-bottom: 20px;
}

/* Inputs */
.input {
    display: block;
    width: 100%;
    margin-top: 6px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
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

/* Checkbox */
.checkbox-group {
    margin-top: 20px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #555;
}

/* Actions row */
.actions {
    margin-top: 20px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 16px;
}

/* Forgot password link */
.forgot-link {
    font-size: 15px;
    color: #000000;
    text-decoration: underline;
}

.forgot-link:hover {
    color: #f1e8e8;
}

/* Primary button */
.primary-button {
    background: #4a67ff;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
}

.primary-button:hover {
    background: #3b55d6;
}

.primary-button.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
