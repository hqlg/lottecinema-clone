<template>
  <h1 class="text-center my-5">{{ title }}</h1>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
  },
};
</script>

<style>
</style>
