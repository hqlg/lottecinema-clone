<template>
  <layout :title="title">
    <app-container>
      <show-empty-message v-if="isEmptyArray(orders.length)" entrie="order" />
      <div v-else>
        <the-title :title="title" />
        <the-alert :successMessage="successMessage" />
        <div class="container-fluid">
          <table class="table">
            <thead class="table-primary">
              <th scope="col">ID</th>
              <th scope="col">Customer ID</th>
              <th scope="col">Total Price</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </thead>
            <tbody>
              <tr v-for="(order, index) in orders" :key="order.id">
                <td>{{ counter(index) }}</td>
                <td>{{ order.customer_id }}</td>
                <td>{{ order.total_price }}</td>
                <td>{{ order.payment_method }}</td>
                <td>{{ order.status }}</td>
                <td>
                  <list-edit-form path="/admin/orders" :model-id="order.id" />
                </td>
                <td>
                  <list-delete-form path="/admin/orders" :model-id="order.id" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </app-container>
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
    orders: {
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
