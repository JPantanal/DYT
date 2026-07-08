<script setup>
import { Link } from '@inertiajs/vue3';

</script>
<template>
<Link :href="href" class="fancy-link" :class="{ 'is-active': active }">
    <span class="fancy-bg"></span>
    <span :class="active ? 'fancy-text-active' : 'fancy-text-inactive'">
        <slot />
    </span>
</Link>


</template>

<style>
.fancy-text-active {
    position: relative;
    color: white;
    transition: all 300ms ease;
}
.fancy-link.is-active .fancy-bg {
    height: 16rem;
    transform: translate(-5rem, -8rem) rotate(45deg);
}

.fancy-text-inactive {
    position: relative;
    color: #4f46e5;
    transition: all 300ms ease;
}

.fancy-link:hover .fancy-text-inactive {
    color: white;
}
.fancy-bg {
    position: absolute;
    width: 16rem;
    height: 0;
    background: #4f46e5;
    top: 50%;
    left: 0;
    transform: translateX(-5rem) rotate(45deg);
    transform-origin: center;
    transition: all 300ms ease;
}


.fancy-link:hover .fancy-bg {
    height: 16rem;
    transform: translate(-5rem, -8rem) rotate(45deg);
}

.fancy-link:hover .fancy-text-inactive {
    color: white;
}

.fancy-link {
    position: relative;
    display: inline-block;
    padding: 0.5rem 0.875rem;
    margin: 0.25rem;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid #4f46e5;
    border-radius: 0.375rem;
    font-weight: 500;
    color: #4f46e5;
    transition: color 300ms ease;
}





</style>
