<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        :success-message="successMessage"
        :errors="errors"
        path="/admin/rooms"
        :model-id="room.id"
      >
        <input-field field-name="name" :value="room.name" label="Name" />
        <select-field
          :is-edit="true"
          :data="cinemas"
          :item-will-change="room"
          field-name="cinema_id"
          label="Room"
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
    room: {
      type: Object,
      required: true,
    },
    cinemas: {
      type: Array,
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
