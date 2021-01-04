<template>
    <div v-if="errors">
        <div v-for="error in errors" :key="error" class="alert alert-danger">
            {{ error }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            errors: Object
        },
    };
</script>

<style>
</style>
