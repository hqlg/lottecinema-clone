<template>
  <form :action="path + '/' + modelId + '/edit'">
    <app-button kind="secondary">Edit</app-button>
  </form>
</template>

<script>
import AppButton from "../ui/AppButton";
import FormMethod from "../common/FormMethod";
export default {
  name: "ListEditForm",
  components: { FormMethod, AppButton },
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
};
</script>

<style scoped>
</style>
