<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

</script>

<template>
  <Link :href="href" :class="active ? 'bottom-active' : 'bottom-inactive'">
    <slot />
</Link>

</template>
<style>
.bottom-active {
    display: inline-flex;
    align-items: center;
    padding-left: 0.25rem;   /* px-1 */
    padding-right: 0.25rem;
    padding-top: 0.25rem;    /* pt-1 */
    border-bottom: 2px solid #818cf8; /* border-indigo-400 */
    font-size: 0.875rem;     /* text-sm */
    font-weight: 500;        /* font-medium */
    line-height: 1.25rem;    /* leading-5 */
    color: #111827;          /* text-gray-900 */
    transition: all 150ms ease-in-out;
}

.bottom-active:focus {
    outline:invert;
    border-bottom-color: #584de9; /* focus:border-indigo-700 */
}
.bottom-inactive {
    display: inline-block;
    font-size: 0.875rem;      /* small text */
    font-weight: normal;      /* no bold */
    color: #060606;           /* dull gray */
    text-decoration: none;    /* no underline */
    padding: 0.25rem 0;       /* minimal spacing */
    border-bottom: none;      /* no active underline */
    transition: none;         /* no animation */
}

.topnav-inactive:hover {
    color: #374151;          /* hover:text-gray-700 */
    border-bottom-color: #d1d5db; /* hover:border-gray-300 */
}

.topnav-inactive:focus {
    outline: none;
    color: #374151;          /* focus:text-gray-700 */
    border-bottom-color: #d1d5db; /* focus:border-gray-300 */
}

</style>
