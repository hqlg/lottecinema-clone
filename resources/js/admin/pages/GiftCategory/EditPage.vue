<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        path="/admin/gift-categories"
        :model-id="giftCategory.id"
        :errors="errors"
      >
        <input-field
          label="Name"
          :value="giftCategory.name"
          field-name="name"
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
    giftCategory: {
      type: Object,
      required: true,
    },
    errors: Object,
  },
};
</script>

<style>
</style>
