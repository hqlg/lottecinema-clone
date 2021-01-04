<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-add-form :errors="errors" path="/admin/gift-categories">
        <input-field field-name="name" label="Name" />
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
    errors: Object,
    successMessage: String,
  },
};
</script>

<style>
</style>
