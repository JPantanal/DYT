<template>
    <transition name="fade">
        <div v-if="show" class="toast">
            {{ message }}
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        message: String,
        duration: {
            type: Number,
            default: 2000
        }
    },
    data() {
        return {
            show: true
        };
    },
    created() {
        setTimeout(() => {
            this.show = false;
            this.$inertia.reload({ only: ['flash'] });
        }, this.duration);
    }
};
</script>

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}

.toast {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 4px;
    z-index: 1000;
}
</style>
