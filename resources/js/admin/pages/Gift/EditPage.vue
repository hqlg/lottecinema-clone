<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        path="/admin/gifts"
        :model-id="gift.id"
        :error="error"
        :message="message"
        :errors="errors"
      >
        <input-field label="Name" :value="gift.name" field-name="name" />
        <input-field label="Price" :value="gift.price" field-name="price" />
        <input-field
          label="Expiration Months"
          :value="gift.expiration_months"
          field-name="expiration_months"
        />
        <input-field
          label="Product content"
          :value="gift.product_content"
          field-name="product_content"
        />
        <select-field
          :is-edit="true"
          :item-will-change="giftCategory"
          field-name="gift_category_id"
          :data="gifts"
          label="Name Gift"
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
    gift: {
      type: Object,
      required: true,
    },
    giftCategory: {
      type: Object,
      required: true,
    },
    gifts: {
      type: Array,
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
