<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        path="/admin/cinemas"
        :model-id="cinema.id"
        :error="error"
        :message="message"
        :errors="errors"
      >
        <input-field label="Name" :value="cinema.name" field-name="name" />
        <select-field
          :is-edit="true"
          :item-will-change="area"
          field-name="area_id"
          :data="areas"
          label="Area Name"
        />
        <app-button kind="primary">Update</app-button>
      </the-update-form>
    </div>
  </layout>
</template>

<script>
import Layout from "../../components/layout/Layout";
import TheUpdateForm from "../../components/form/TheUpdateForm.vue";
import InputField from "../../components/form/components/InputField";
import SelectField from "../../components/form/components/SelectField";
import AppButton from "../../components/ui/AppButton";
import TheTitle from "../../components/ui/TheTitle";

export default {
  name: "CinemaEditPage",
  components: {
    TheTitle,
    AppButton,
    SelectField,
    InputField,
    Layout,
    TheUpdateForm,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    cinema: {
      type: Object,
      required: true,
    },
    area: {
      type: Object,
      required: true,
    },
    areas: {
      type: Object,
      required: true,
    },
    message: {
      type: String,
    },
    error: {
      type: String,
    },
    errors: Object,
  },
};
</script>

<style>
</style>
