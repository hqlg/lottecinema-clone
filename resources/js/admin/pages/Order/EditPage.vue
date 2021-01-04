<template>
  <layout :title="title">
    <div class="container-fluid">
      <the-title :title="title" />
      <the-update-form
        :success-message="successMessage"
        :errors="errors"
        path="/admin/orders"
        :model-id="order.id"
      >
        <input-field
          field-name="total_price"
          label="Total Price"
          type="number"
          :value="order.total_price"
        />
        <input-field
          field-name="payment_method"
          label="Payment Method"
          type="text"
          :value="order.payment_method"
        />
        <input-field :value="order.status" field-name="status" label="Status" />
        <select-field
          :data="customers"
          :is-edit="true"
          :item-will-chang="customer"
          field-name="customer_id"
          label="Customer"
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
    order: {
      type: Object,
      required: true,
    },
    customers: {
      type: Array,
      required: true,
    },
    customer: {
      type: Object,
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
