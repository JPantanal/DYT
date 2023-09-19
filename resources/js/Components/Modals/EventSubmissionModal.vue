<script setup>



</script>


<template>
    <form>
        <label class="label">Name</label>
        <div class="control">
            <input v-model="form.name" class="input" type="text" placeholder="Text input">

            <button @click = "submit" type = "submmit" class="bg-white p-2 border-l">Request</button>
        </div>
    </form>
</template>
