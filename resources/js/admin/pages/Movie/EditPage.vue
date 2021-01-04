<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        :message="message"
        :error="error"
        :errors="errors"
        path="/admin/movies"
        :model-id="movie.id"
      >
        <input-field field-name="name" :value="movie.name" label="Name" />
        <input-field
          type="number"
          field-name="price"
          :value="movie.price"
          label="Price"
        />
        <input-field
          type="url"
          field-name="img_url"
          :value="movie.img_url"
          label="Image Url"
        />
        <input-field
          type="date"
          field-name="release_date"
          :value="movie.release_date"
          label="Release Date"
        />
        <input-field
          type="number"
          field-name="duration"
          :value="movie.duration"
          label="Duration"
        />
        <input-field
          type="url"
          field-name="movie_url"
          :value="movie.movie_url"
          label="Movie Url"
        />
        <select-field
          label="Cinemas"
          :item-will-change="cinema"
          :is-edit="true"
          field-name="cinema_id"
          :data="cinemas"
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
    cinemas: {
      type: Array,
      required: true,
    },
    cinema: {
      type: Object,
      required: true,
    },
    movie: {
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
