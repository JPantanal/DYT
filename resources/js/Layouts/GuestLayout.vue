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
                <div class="row">

                 <a href="http://127.0.0.1:8000/">
                    <img src="DYTLogo.png" width="200" alt="DYTlogo" class="logo-class" />
                </a>

                <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                    Testimonials
                </JohnLink>

                <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </JohnLink>
                  </div>

            <div class="row">
                <JohnLink :href="route('profile.edit')"> Profile </JohnLink>
                <JohnLink :href="route('logout')" method="post" as="button">
                    Log Out
                </JohnLink>
            </div>
        </template>

        <!-- Guest Navigation -->
        <template v-else>
            <div class="linkers-left">
                <a href="http://127.0.0.1:8000/">
                        <img src="DYTLogo.png" width="200" alt="DYTlogo" class="main-logo">
                </a>
                    <JohnLink :href="route('testimonials')" :active="route().current('testimonials')">
                        Testimonials
                    </JohnLink>

                    <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                    </JohnLink>
            </div>

            <div class="linkers-right">
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
        <div class="class6">
            <slot />
        </div>
    </main>

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
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}


.main-logo {

    position: static;
    z-index: 50;
}

.top-nav-bar {
    display: flex;
    align-items: center;
    justify-content:space-between;
    background-color: rgb(216 180 254); /* lavender-like */
    padding: 0.75rem 1.5rem; /* top/bottom 0.75rem, left/right 1.5rem */
    width: 100%;
    box-sizing: border-box;
}

.class3 {
  white-space: nowrap;
  --tw-text-opacity: 1;
  color: rgb(229 231 235 / var(--tw-text-opacity, 1));
}

.class3:hover {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity, 1));
}

.class6 {
  position: relative;
  min-height: 100vh;
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity, 1));
}

@media (min-width: 640px) {
  .class6 {
    display: flex;
    align-items: center;
    justify-content: center;
  }
}

.linkers-left {
  display: flex;
  align-items: center;
  gap: .5rem;
}
.linkers-right {
  display: flex;
  align-items: right;
  gap: .5rem;
}

.linkers > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(1rem * var(--tw-space-x-reverse));
  margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
}


.row {
  display: flex;
  gap: 1rem; /* Tailwind's space-x-4 */
}
.row2 {
  display: flex;
  align-items: center;
  gap: 0.5rem; /* same as Tailwind space-x-2 */
}


.footer {
    background: #e5e7eb;
    color: #374151;
    padding: 1rem;
}

.footer-container {
    margin: 0 auto;
    display: flex;
    justify-content:space-between;
    align-items: center;
    width: 100%;
}

.footer-links {
    display: flex;
    align-items: left;
    color: #4b5563;

}

.footer-link {

}

.footer-link:hover {
    color: #111827;
}

.footer-divider {
    margin: 0 0.5rem;
}







</style>


-->- "Empowering Dayton learners with personalized, proven support."
- "Where Dayton students grow, thrive, and succeed together."
- "Smart help, real progress — the DYT Tutoring way."
- "Local tutors. Big results. Confidence that lasts."
- "Helping Dayton students shine — one lesson at a time."
- "Tutoring that fits your goals, pace, and style."
- "From confusion to clarity — DYT makes learning click."-->
