<template>
  <layout :title="title">
    <app-container>
      <the-title :title="title" />
      <the-add-form
        :errors="errors"
        :successMessage="successMessage"
        path="/admin/customers"
      >
        <input-field field-name="name" label="Name" />
        <input-field field-name="email" type="email" label="Email" />
        <input-field field-name="password" type="password" label="Password" />
        <input-field field-name="address" label="Address" />
        <input-field field-name="phone" type="number" label="Phone" />
        <input-field field-name="avatar_url" type="url" label="Avatar Url" />
        <app-button kind="primary">Create</app-button>
      </the-add-form>
    </app-container>
  </layout>
</template>

<script>
import InputField from "../../components/form/components/InputField.vue";
import TheAddForm from "../../components/form/TheAddForm.vue";
import Layout from "../../components/layout/Layout.vue";
import TheTitle from "../../components/ui/TheTitle.vue";
import SelectField from "../../components/form/components/SelectField";
import AppContainer from "../../components/ui/AppContainer";
import AppButton from "../../components/ui/AppButton";

export default {
  name: "SeatCreatePage",
  components: {
    AppButton,
    SelectField,
    Layout,
    InputField,
    TheAddForm,
    TheTitle,
    AppContainer,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    errors: {
      type: Object,
    },
    successMessage: String,
  },
};
</script>

<style>
</style>
