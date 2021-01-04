<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        :success-message="successMessage"
        :errors="errors"
        path="/admin/customers"
        :model-id="customer.id"
      >
        <input-field field-name="name" :value="customer.name" label="Name" />
        <input-field
          field-name="password"
          :value="customer.password"
          label="Password"
        />
        <input-field field-name="email" :value="customer.email" label="Email" />
        <input-field
          field-name="address"
          :value="customer.address"
          label="Address"
        />
        <input-field field-name="phone" :value="customer.phone" label="Phone" />
        <input-field
          field-name="avatar_url"
          :value="customer.avatar_url"
          label="Avar Url"
        />
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
    customer: {
      type: Object,
      required: true,
    },
    title: {
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
