<template>
  <input :value="csrfToken" type="hidden" name="_token" id="csrf-token" />
</template>

<script>
export default {
    name: "TheCsrf",
  data() {
    return {
      csrfToken: null,
    };
  },
  created() {
    this.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
  },
};
</script>

<style>
</style>
