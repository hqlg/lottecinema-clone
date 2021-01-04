<template>
  <form method="POST" :action="path + '/' + modelId">
    <form-method method-name="PUT" />
    <the-csrf />
    <the-alert :message="message" :error="error" />
    <show-errors :errors="errors" />
    <slot />
  </form>
</template>

<script>
import ShowErrors from "./components/ShowErrors.vue";
import FormMethod from "../common/FormMethod";
import TheCsrf from "../common/TheCsrf";
import TheAlert from "./components/TheAlert";

export default {
  components: { ShowErrors, FormMethod, TheCsrf, TheAlert },
  props: {
    path: {
      type: String,
      required: true,
    },
    modelId: {
      type: Number,
      required: true,
    },
    message: String,
    error: String,
    errors: Object,
  },
};
</script>

<style>
</style>
