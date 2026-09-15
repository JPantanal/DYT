<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import JohnLink from '@/Components/JohnLink.vue';

import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
const showingNavigationDropdown = ref(false);
</script>
<template>

    <div class="layout">
        <nav class="nav">
            <div class="nav-container">
                <div class="nav-row">

                    <!-- Left -->
                    <div class="nav-left">
                        <div class="logo-area">
                            <a href="/">
                                <img src="DYTLogo.png" width="200" alt="DYTlogo" class="logo-class" />
                            </a>
                        </div>
                        <div class="nav-links">
                            <JohnLink :href="route('dashboard')" :active="route().current('dashboard')">
                                Dashboard
                            </JohnLink>

                            <JohnLink :href="route('events.index')" :active="route().current('events.index')">
                                Calendar
                            </JohnLink>

                            <JohnLink :href="route('payments.index')" :active="route().current('payments.index')">
                                Payments
                            </JohnLink>
                        </div>
                    </div>

                    <!-- Right -->
                    <div class="nav-right">
                        <div class="settings">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="dropdown-trigger">
                                        <button type="button" class="dropdown-button">
                                            {{ $page.props.auth.user.name }}

                                            <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="hamburger">
                        <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="hamburger-button">
                            <svg class="hamburger-icon" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="showingNavigationDropdown ? 'icon-hidden' : 'icon-visible'"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />

                                <path :class="showingNavigationDropdown ? 'icon-visible' : 'icon-hidden'"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Nav -->
            <div :class="showingNavigationDropdown ? 'mobile-nav-show' : 'mobile-nav-hide'" class="mobile-nav">
                <div class="mobile-links">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                    </ResponsiveNavLink>

                    <ResponsiveNavLink :href="route('events.index')" :active="route().current('events.index')">
                        Events
                    </ResponsiveNavLink>

                    <ResponsiveNavLink :href="route('payments.index')" :active="route().current('payments.index')">
                        Payments
                    </ResponsiveNavLink>
                </div>

                <div class="mobile-settings">
                    <div class="mobile-user">
                        <div class="user-name">{{ $page.props.auth.user.name }}</div>
                        <div class="user-email">{{ $page.props.auth.user.email }}</div>
                    </div>

                    <div class="mobile-settings-links">
                        <JohnLink :href="route('profile.edit')"> Profile </JohnLink>
                        <JohnLink :href="route('logout')"> Log Out </JohnLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="header" v-if="$slots.header">
            <div class="header-inner">
                <slot name="header" />
            </div>
        </header>

        <!-- Main -->
        <main class="main">
            <slot />
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div>
                <p>&copy; 2023 DaytonTutoring. All rights reserved.</p>
            </div>
            <div class="footer-links">
                <nav-link :href="route('PrivacyPolicy')" :active="route().current('PrivacyPolicy')">
                    Privacy Policy
                </nav-link>

                <span class="footer-divider">|</span>

                <nav-link :href="route('TermsOfUse')" :active="route().current('TermsOfUse')">
                    Terms of Use
                </nav-link>
            </div>
        </div>
    </footer>
</template>

<style>
/* Layout */
.layout {
    min-height: 100vh;
    width: 100%;
    background-color: #f3f4f6;
    display: flex;
    flex-direction: column;
}

/* Navigation */
.nav {
    background-color: #ffffff;
    border-bottom: 1px solid #e5e7eb;
}

.nav-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 1rem;
}

.nav-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 4rem;
}

.nav-left {
    display: flex;
    align-items: center;
}

.logo-area {
    display: flex;
    align-items: center;
}

.nav-links {
    display: none;
}

@media (min-width: 640px) {
    .nav-links {
        display: flex;
        gap: 2rem;
        margin-left: 2.5rem;
    }
}

/* Right side */
.nav-right {
    display: none;
}

@media (min-width: 640px) {
    .nav-right {
        display: flex;
        align-items: center;
    }
}

/* Dropdown */
.dropdown-trigger {
    display: inline-flex;
}

.dropdown-button {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    background: white;
    color: #6b7280;
    border: none;
    cursor: pointer;
}

.dropdown-button:hover {
    color: #374151;
}

.dropdown-icon {
    margin-left: 0.5rem;
    width: 1rem;
    height: 1rem;
}

/* Hamburger */
.hamburger {
    display: flex;
    align-items: center;
}

@media (min-width: 640px) {
    .hamburger {
        display: none;
    }
}

.hamburger-button {
    padding: 0.5rem;
    background: transparent;
    border: none;
    cursor: pointer;
}

.hamburger-icon {
    width: 1.5rem;
    height: 1.5rem;
}

/* Mobile nav */
.mobile-nav {
    display: none;
}

.mobile-nav-show {
    display: block;
}

.mobile-links {
    padding: 0.5rem 0;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.mobile-settings {
    padding: 1rem 0;
    border-top: 1px solid #e5e7eb;
}

.mobile-user {
    padding: 0 1rem;
}

.user-name {
    font-size: 1rem;
    color: #1f2937;
}

.user-email {
    font-size: 0.875rem;
    color: #6b7280;
}

.mobile-settings-links {
    margin-top: 0.75rem;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

/* Header */
.header {
    background: white;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.header-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 1.5rem 1rem;
}

/* Main */
.main {
    flex: 1;
    padding: 1rem;
}

/* Footer */
.footer {
    background: #e5e7eb;
    color: #374151;
    padding: 1rem;
}

.footer-container {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-links {
    display: flex;
    align-items: center;
}

.footer-divider {
    margin: 0 0.5rem;
}
</style>
