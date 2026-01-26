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
        default: false,
    },
});

// Active state only affects the *text* span
const textClasses = computed(() =>
    props.active
        ? 'relative text-white transition duration-300 ease'
        : 'relative text-indigo-600 transition duration-300 group-hover:text-white ease'
);
</script>

<template>
    <Link
        :href="href"
        class="rounded-md px-3.5 py-2 m-1 overflow-hidden relative group cursor-pointer 
               border-2 font-medium border-indigo-600 text-indigo-600"
    >
        <!-- Animated background span -->
        <span
            class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 
                   -translate-x-20 bg-indigo-600 top-1/2 
                   group-hover:h-64 group-hover:-translate-y-32 ease"
        ></span>

        <!-- Foreground text -->
        <span :class="textClasses">
            <slot />
        </span>
    </Link>
</template>