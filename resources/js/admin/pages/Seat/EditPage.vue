<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        :success-message="successMessage"
        :errors="errors"
        path="/admin/seats"
        :model-id="seat.id"
      >
        <input-field
          field-name="seat_number"
          :value="seat.seat_number"
          label="Name"
        />
        <select-field
          :data="rooms"
          field-name="room_id"
          :item-will-change="room"
          :is-edit="true"
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
    seat: {
      type: Object,
      required: true,
    },
    room: Object,
    rooms: {
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
