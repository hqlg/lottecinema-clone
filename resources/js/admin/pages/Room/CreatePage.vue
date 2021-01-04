<template>
  <layout :title="title">
    <app-container>
      <the-title :title="title" />
      <the-add-form
        :errors="errors"
        :successMessage="successMessage"
        path="/admin/rooms"
      >
        <input-field field-name="name" label="Name" />
        <select-field :data="cinemas" label="Cinema" field-name="cinema_id" />
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
  name: "RoomCreatePage",
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
    cinemas: {
      type: Array,
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
