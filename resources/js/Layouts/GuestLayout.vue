<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import primarybtn from '@/Components/PrimaryButton.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Testimonials from '@/Pages/Testimonials.vue';
import JohnLink from '@/Components/JohnLink.vue';
</script>

<template>
    <nav class="flex items-center justify-end gap-4">
        <Link v-if="$page.props.auth.user" :href="route('dashboard')" :active="route().current('dashboard')"
            class="ml-4">
            Dashboard
        </Link>
        <ResponsiveNavLink v-if="$page.props.auth.user" :href="route('testimonials')"
            :active="route().current('testimonials')" class="ml-4">
            Testimonials
        </ResponsiveNavLink>

        <template v-else>
            <ResponsiveNavLink :href="route('testimonials')" :active="route().current('testimonials')" class="ml-4">
                Testimonials
            </ResponsiveNavLink>

            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')" class=" ml-4">
                Dashboard
            </ResponsiveNavLink>

            <nav class="flex justify-end space-x-1">
                <john-link :href="route('login')" :active="route().current('login')">
                    Login
                </john-link>
                <john-link :href="route('register')" :active="route().current('register')" class="ml-4">
                    Register
                </john-link>
            </nav>


        </template>
    </nav>

    <main>
        <slot />
    </main>


    <footer class="bg-gray-200 text-gray-700 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <p>&copy; 2023 DaytonTutoring. All rights reserved.</p>
            </div>
            <div class="flex items-center ">
                <nav-link :href="route('PrivacyPolicy')" method="get" as="button"
                    class="text-gray-600 hover:text-gray-900 whitespace-nowrap">
                    Privacy Policy
                </nav-link>
                <span class="mx-2">|</span>
                <nav-link :href="route('TermsOfUse')" method="get" as="button"
                    class="text-gray-600 hover:text-gray-900 whitespace-nowrap">
                    Terms of Use
                </nav-link>
            </div>
        </div>
    </footer>
</template>
