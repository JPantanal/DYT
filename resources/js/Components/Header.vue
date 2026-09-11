<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});

</script>

<template>
<div class="top-bar"></div>


</template>


<style>
.top-bar {
    background-color: #000;
    min-height: 25px;
    width: 100%;
}
</style>
