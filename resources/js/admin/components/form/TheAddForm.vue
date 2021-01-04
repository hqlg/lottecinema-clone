<template>
  <form method="POST" :action="path">
    <the-alert :successMessage="successMessage" />
    <the-csrf />
    <show-errors :errors="errors" />
    <slot />
  </form>
</template>

<script>
import TheCsrf from "../common/TheCsrf";
import TheAlert from "./components/TheAlert";
import ShowErrors from "./components/ShowErrors";
export default {
  components: { TheCsrf, TheAlert, ShowErrors },
  props: {
    path: {
      type: String,
      required: true,
    },
    errors: Object,
    successMessage: String,
  },
};
</script>

<style>
</style>
