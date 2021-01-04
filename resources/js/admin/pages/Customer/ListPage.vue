<template>
  <layout :title="title">
    <show-empty-message
      v-if="isEmptyArray(customers.length)"
      entrie="customer"
    />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Password</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Avatar Url</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(customer, index) in customers" :key="customer.id">
              <td>{{ counter(index) }}</td>
              <td>{{ customer.name }}</td>
              <td>{{ shortent(customer.password) }}</td>
              <td>{{ shortent(customer.email) }}</td>
              <td>{{ shortent(customer.address) }}</td>
              <td>{{ customer.phone }}</td>
              <td>
                <img
                  class="wh-100"
                  :src="customer.avatar_url"
                  :alt="customer.name"
                />
              </td>
              <td>{{ customer.remember_token }}</td>
              <td>
                <list-edit-form
                  path="/admin/customers"
                  :model-id="customer.id"
                />
              </td>
              <td>
                <list-delete-form
                  path="/admin/customers"
                  :model-id="customer.id"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../components/layout/Layout.vue";
import ShowEmptyMessage from "../../components/form/components/ShowEmptyMessage.vue";
import TheTitle from "../../components/ui/TheTitle";
import { isEmptyArray, reconfirm, counter, shortent } from "../../helpers";
import ListEditForm from "../../components/form/ListEditForm";
import ListDeleteForm from "../../components/form/ListDeleteForm";
import AppContainer from "../../components/ui/AppContainer.vue";
import TheAlert from "../../components/form/components/TheAlert";

export default {
  name: "CustomerListPage",
  components: {
    ListDeleteForm,
    ListEditForm,
    Layout,
    TheTitle,
    ShowEmptyMessage,
    AppContainer,
    TheAlert,
  },
  props: {
    customers: {
      type: Array,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    successMessage: String,
  },
  methods: {
    isEmptyArray,
    reconfirm,
    counter,
    shortent,
  },
};
</script>

<style>
</style>
