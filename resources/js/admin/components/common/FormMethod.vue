<template>
    <input type="hidden" name="_method" :value="methodName"/>
</template>

<script>
    export default {
        props: {
            methodName: {
                type: String,
                default: "PUT",
            },
        },
    };
</script>

<style>
</style>
