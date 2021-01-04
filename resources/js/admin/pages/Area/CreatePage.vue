<template>
  <layout :title="title">
    <app-container>
      <the-title :title="title" />
      <div class="alert alert-success" v-if="successMessage">
        {{ successMessage }}
      </div>
      <the-add-form
        path="/admin/areas"
        :message="message"
        :error="error"
        :errors="errors"
      >
        <input-field label="Name" field-name="name" />
        <app-button kind="primary">Create</app-button>
      </the-add-form>
    </app-container>
  </layout>
</template>

<script>
import Layout from "../../components/layout/Layout";
import TheTitle from "../../components/ui/TheTitle.vue";
import TheAddForm from "../../components/form/TheAddForm.vue";
import InputField from "../../components/form/components/InputField";
import AppButton from "../../components/ui/AppButton";
import AppContainer from "../../components/ui/AppContainer";

export default {
  name: "AreaCreatePage",
  components: {
    AppContainer,
    AppButton,
    InputField,
    Layout,
    TheTitle,
    TheAddForm,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    successMessage: String,
    message: String,
    error: String,
    errors: Object,
  },
};
</script>

<style>
</style>
