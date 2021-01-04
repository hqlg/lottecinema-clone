<template>
  <layout :title="title">
    <app-container>
      <the-title :title="title" />
      <the-add-form path="/admin/movies">
        <input-field field-name="name" label="Name" />
        <input-field field-name="price" label="Price" type="number" />
        <input-field field-name="img_url" label="Image Url" type="url" />
        <input-field
          field-name="release_date"
          label="Release Date"
          type="date"
        />
        <input-field field-name="duration" label="Duration" type="number" />
        <input-field field-name="movie_url" label="Movie Url" type="url" />
        <select-field
          label="Choose an cinema"
          field-name="cinema_id"
          :data="cinemas"
        />
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
  name: "CinemaCreatePage",
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
    message: {
      type: String,
    },
    error: {
      type: String,
    },
    errors: {
      type: Object,
    },
  },
};
</script>

<style>
</style>
