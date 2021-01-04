<template>
  <div v-if="successMessage" class="alert alert-success">
    {{ successMessage }}
  </div>
</template>

<script>
export default {
  props: {
    successMessage: {
      type: String,
    },
  },
};
</script>

<style>
</style>
