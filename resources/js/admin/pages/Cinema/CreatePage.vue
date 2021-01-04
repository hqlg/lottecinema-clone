<template>
  <layout>
    <div class="container-fluid">
      <the-title :title="title" />
      <the-add-form path="/admin/cinemas">
        <input-field label="Name" field-name="name" />
        <select-field :data="areas" field-name="area_id" label="Area" />
        <button type="submit" class="btn btn-primary">Create</button>
      </the-add-form>
    </div>
  </layout>
</template>

<script>
import InputField from "../../components/form/components/InputField.vue";
import SelectField from "../../components/form/components/SelectField.vue";
import TheAddForm from "../../components/form/TheAddForm.vue";
import Layout from "../../components/layout/Layout.vue";
import TheTitle from "../../components/ui/TheTitle.vue";
export default {
  name: "CinemaCreatePage",
  components: { Layout, TheTitle, TheAddForm, InputField, SelectField },
  props: {
    title: {
      type: String,
      required: true,
    },
    areas: {
      type: Array,
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
