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
  <Link :href="href" :class="active ? 'navlink-active' : 'navlink-inactive'">
    <slot />
</Link>

</template>

<style>

.navlink-active {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem; /* pl-3 pr-4 py-2 */
    border-left: 4px solid #818cf8; /* border-indigo-400 */
    text-align: left;
    font-size: 1rem; /* text-base */
    font-weight: 500; /* font-medium */
    color: #4338ca; /* text-indigo-700 */
    background-color: #eef2ff; /* bg-indigo-50 */
    transition: all 150ms ease-in-out;
}

.navlink-active:focus {
    outline: none;
    color: #3730a3; /* focus:text-indigo-800 */
    background-color: #e0e7ff; /* focus:bg-indigo-100 */
    border-left-color: #3730a3; /* focus:border-indigo-700 */
}

.navlink-inactive {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem; /* pl-3 pr-4 py-2 */
    border-left: 4px solid transparent;
    text-align: left;
    font-size: 1rem; /* text-base */
    font-weight: 500; /* font-medium */
    color: #4b5563; /* text-gray-600 */
    transition: all 150ms ease-in-out;
}

.navlink-inactive:hover {
    color: #1f2937; /* hover:text-gray-800 */
    background-color: #f9fafb; /* hover:bg-gray-50 */
    border-left-color: #d1d5db; /* hover:border-gray-300 */
}

.navlink-inactive:focus {
    outline: none;
    color: #1f2937; /* focus:text-gray-800 */
    background-color: #f9fafb; /* focus:bg-gray-50 */
    border-left-color: #d1d5db; /* focus:border-gray-300 */
}

</style>
