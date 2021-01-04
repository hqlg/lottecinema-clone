<template>
  <button :type="type" :class="'btn btn-' + kind">
    <slot />
  </button>
</template>

<script>
export default {
  name: "AppButton",
  props: {
    kind: {
      type: String,
      default: "primary",
    },
    type: String,
  },
};
</script>

<style scoped>
</style>
