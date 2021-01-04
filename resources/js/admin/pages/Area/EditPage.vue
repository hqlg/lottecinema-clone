<template>
  <layout :title="title">
    <app-container>
      <the-title :title="title" />
      <the-update-form
        :error="error"
        :message="message"
        :errors="errors"
        path="/admin/areas"
        :model-id="area.id"
      >
        <input-field label="Name" field-name="name" :value="area.name" />
        <app-button kind="primary">Update</app-button>
      </the-update-form>
    </app-container>
  </layout>
</template>

<script>
import TheUpdateForm from "../../components/form/TheUpdateForm";
import Layout from "../../components/layout/Layout";
import InputField from "../../components/form/components/InputField";
import TheTitle from "../../components/ui/TheTitle";
import AppButton from "../../components/ui/AppButton";
import AppContainer from "../../components/ui/AppContainer";

export default {
  name: "AreaEditPage",
  components: {
    AppContainer,
    AppButton,
    TheTitle,
    Layout,
    InputField,
    TheUpdateForm,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    area: {
      type: Object,
      required: true,
    },
    message: {
      type: String,
    },
    error: {
      type: String,
    },
    successMessage: String,
    errors: Object,
  },
  data() {
    return {
      form: {
        name: this.area.name,
      },
    };
  },
  methods: {
    updateArea() {
      this.$inertia.put(`/admin/areas/${this.area.id}`, this.form);
    },
  },
};
</script>

<style>
</style>
