<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        :message="message"
        :error="error"
        :errors="errors"
        path="/admin/times"
        :model-id="time.id"
      >
        <input-field field-name="name" :value="time.name" label="Name" />
        <app-button kind="primary">Update</app-button>
      </the-update-form>
    </div>
  </layout>
</template>

<script>
import Layout from "../../components/layout/Layout";
import TheUpdateForm from "../../components/form/TheUpdateForm";
import InputField from "../../components/form/components/InputField";
import SelectField from "../../components/form/components/SelectField";
import TheTitle from "../../components/ui/TheTitle";
import AppButton from "../../components/ui/AppButton";

export default {
  name: "CinemaEditPage",
  components: {
    AppButton,
    SelectField,
    InputField,
    TheUpdateForm,
    Layout,
    TheTitle,
  },
  props: {
    time: {
      type: Object,
      required: true,
    },
    title: {
      type: String,
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
