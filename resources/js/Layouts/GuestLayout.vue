<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Testimonials from '@/Pages/Testimonials.vue';
import JohnLink from '@/Components/JohnLink.vue';
</script>

<template>

    <!-- Top Navigation -->
    <nav class="flex items-center justify-between px-4 py-3 bg-gray-900">

        <!-- Authenticated User Navigation -->
        <template v-if="$page.props.auth.user">
            <div class="flex space-x-4">
                <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </JohnLink>

                <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                    Testimonials
                </JohnLink>
            </div>
        </template>

        <!-- Guest Navigation -->
        <template v-else>
            <div class="flex space-x-4">
                <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                    Testimonials
                </JohnLink>

                <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </JohnLink>
            </div>

            <div class="flex space-x-4">
                <JohnLink :href="route('login')" :active="route().current('login')">
                    Login
                </JohnLink>

                <JohnLink :href="route('register')" :active="route().current('register')">
                    Register
                </JohnLink>
            </div>
        </template>

    </nav>

    <!-- Main Content -->
    <main>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-200">
            <slot />
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-200 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">

            <p>&copy; 2023 DaytonTutoring. All rights reserved.</p>

            <div class="flex items-center space-x-2">
                <NavLink :href="route('PrivacyPolicy')" method="get" as="button"
                    class="text-gray-200 hover:text-gray-300 whitespace-nowrap">
                    Privacy Policy
                </NavLink>

                <span>|</span>

                <NavLink :href="route('TermsOfUse')" method="get" as="button"
                    class="text-gray-200 hover:text-gray-300 whitespace-nowrap">
                    Terms of Use
                </NavLink>
            </div>
        </div>
    </footer>

</template>
