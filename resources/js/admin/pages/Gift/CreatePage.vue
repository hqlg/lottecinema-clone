<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-add-form :errors="errors" path="/admin/gifts">
        <input-field field-name="name" label="Name" />
        <input-field field-name="price" type="number" label="Price" />
        <input-field
          field-name="expiration_months"
          type="number"
          label="Expration Month"
        />
        <input-field field-name="product_content" label="Product content" />
        <select-field
          :data="giftCategories"
          field-name="gift_category_id"
          label="Gift Category"
        />
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
    giftCategories: {
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
