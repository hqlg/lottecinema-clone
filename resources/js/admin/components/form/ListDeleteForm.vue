<template>
  <form method="POST" @submit.prevent="onSubmit">
    <app-button kind="danger">Delete</app-button>
    <slot />
  </form>
</template>

<script>
import AppButton from "../ui/AppButton";
export default {
  name: "ListDeleteForm",
  components: { AppButton },
  props: {
    path: {
      type: String,
      required: true,
    },
    modelId: {
      type: Number,
      required: true,
    },
  },
  methods: {
    onSubmit() {
      this.$inertia.delete(`${this.path}/${this.modelId}`);
    },
  },
};
</script>

<style scoped>
</style>
