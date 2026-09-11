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
    <nav class="top-nav-bar">

        <!-- Authenticated User Navigation -->
        <template v-if="$page.props.auth.user">

            <div class="nav-row">
                <a href="/">
                    <img src="DYTLogo.png" width="200" alt="DYTlogo" class="logo-class" />
                </a>

                <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                    Testimonials
                </JohnLink>

                <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </JohnLink>
            </div>

            <div class="nav-row">
                <JohnLink :href="route('profile.edit')">Profile</JohnLink>
                <JohnLink :href="route('logout')" method="post" as="button">
                    Log Out
                </JohnLink>
            </div>

        </template>

        <!-- Guest Navigation -->
        <template v-else>

            <div class="nav-left">
                <a href="/">
                    <img src="DYTLogo.png" width="200" alt="DYTlogo" class="main-logo">
                </a>

                <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                    Testimonials
                </JohnLink>

                <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </JohnLink>
            </div>

            <div class="nav-right">
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
    <main class="main-content">
        <div class="content-wrapper">
            <slot />
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">

            <div>
                <p>&copy; 2023 DaytonTutoring. All rights reserved.</p>
            </div>

            <div class="footer-links">
                <nav-link :href="route('PrivacyPolicy')" method="get" as="button" class="footer-link">
                    Privacy Policy
                </nav-link>

                <span class="footer-divider">|</span>

                <nav-link :href="route('TermsOfUse')" method="get" as="button" class="footer-link">
                    Terms of Use
                </nav-link>
            </div>

        </div>
    </footer>

</template>

<style>
/* ---------------------- */
/* TOP NAVIGATION BAR     */
/* ---------------------- */

.top-nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(216, 180, 254);
    /* soft lavender */
    padding: 12px 5px 8px;
    width: 100%;
    box-sizing: border-box;
}

.nav-row {
    display: flex;
    align-items: center;
    gap: 16px;
}

.nav-left,
.nav-right {
    display: flex;
    align-items: center;
    gap: 12px;
}

.logo-class,
.main-logo {
    display: block;
}

/* ---------------------- */
/* MAIN CONTENT           */
/* ---------------------- */

.main-content {
    background-color: rgb(160, 132, 252);
    /* dark slate */
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    font-family: 'Circular Std';

}

.content-wrapper {
    width: 100%;
    max-width: 1200px;
    padding: 40px 20px;
    box-sizing: border-box;
}

/* ---------------------- */
/* FOOTER                 */
/* ---------------------- */

.footer {
    background: #e5e7eb;
    color: #374151;
    padding: 2px;
    padding-left: 5px;
    padding-right: 5px;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-links {
    display: flex;
    align-items: center;
}

.footer-link {
    color: #4b5563;
    text-decoration: none;
}

.footer-link:hover {
    color: #111827;
}

.footer-divider {
    margin: 0px;
}
</style>
