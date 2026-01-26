<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import primarybtn from '@/Components/PrimaryButton.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>

<template>
    <nav class="flex items-center justify-end gap-4">
        <Link v-if="$page.props.auth.user" :href="route('dashboard')" :active="route().current('dashboard')"
            class="ml-4">
            Dashboard
        </Link>
        <div v-if=$page.props.auth.user>
            <primarybtn class="ml-4"> Testimonials</primarybtn>
        </div>

        <template v-else>
            <ResponsiveNavLink class="ml-4"> Testimonials</ResponsiveNavLink>
            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                Dashboard
            </ResponsiveNavLink>

            <Link :href="route('login')" :active="route().current('login')" class="=ml-4">
                Log in
            </Link>
            <Link :href="route('register')" :active="route().current('register')" class="ml-4">
                Register
            </Link>
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
