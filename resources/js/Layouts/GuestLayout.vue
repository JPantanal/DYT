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
    <nav class="flex items-center justify-between px-4 py-3 bg-gray-200">
        <!-- Authenticated User Navigation -->
        <template v-if="$page.props.auth.user">
            <div class="relative flex items-center space-x-4 pl-[200px]">
                <a href="http://127.0.0.1:8000/">
                    <img src="DYTLogo.png" width="200" alt="DYTlogo" class="absolute top-0 left-0 z-10" />
                </a>
                <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                    Testimonials
                </JohnLink>

                <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </JohnLink>

            </div>

            <div class="flex space-x-4">
                <JohnLink :href="route('profile.edit')"> Profile </JohnLink>
                <JohnLink :href="route('logout')" method="post" as="button">
                    Log Out
                </JohnLink>
            </div>
        </template>
        <!-- Guest Navigation -->
        <template v-else>
            <div class="relative flex items-center space-x-4 pl-[200px]">
                <a href="http://127.0.0.1:8000/">
                    <img src="DYTLogo.png" width="200" alt="DYTlogo" class="absolute top-0 left-0 z-10" />
                </a>
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
<style>
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}


.main-logo {
    top: 0;
    left: 0;
    position: absolute;
    z-index: 4;
}
</style>


-->- "Empowering Dayton learners with personalized, proven support."
- "Where Dayton students grow, thrive, and succeed together."
- "Smart help, real progress — the DYT Tutoring way."
- "Local tutors. Big results. Confidence that lasts."
- "Helping Dayton students shine — one lesson at a time."
- "Tutoring that fits your goals, pace, and style."
- "From confusion to clarity — DYT makes learning click."-->
