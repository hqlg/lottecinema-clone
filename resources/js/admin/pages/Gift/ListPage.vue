<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(gifts.length)" entrie="gift" />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Name</th>
            <th id="area">Price</th>
            <th id="area">Expiration Months</th>
            <th id="area">Gift Category</th>
            <th id="hidden"></th>
            <th id="hidden2"></th>
          </thead>
          <tbody>
            <tr v-for="(gift, index) in gifts" :key="gift.id">
              <td>{{ ++index }}</td>
              <td>{{ gift.name }}</td>
              <td>{{ gift.price }}</td>
              <td>{{ gift.expiration_months }}</td>
              <td>{{ gift.gift_category_id }}</td>
              <td>
                <list-edit-form path="/admin/gifts" :model-id="gift.id" />
              </td>
              <td>
                <list-delete-form path="/admin/gifts" :model-id="gift.id" />
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
import TheTitle from "../../components/ui/TheTitle.vue";
import { isEmptyArray } from "../../helpers";
import AppButton from "../../components/ui/AppButton";
import ListEditForm from "../../components/form/ListEditForm";
import ListDeleteForm from "../../components/form/ListDeleteForm";
import TheAlert from "../../components/form/components/TheAlert.vue";

export default {
  name: "CinemaListPage",
  components: {
    ListDeleteForm,
    ListEditForm,
    AppButton,
    Layout,
    TheTitle,
    ShowEmptyMessage,
    TheAlert,
  },
  props: {
    gifts: {
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
  },
};
</script>

<style>
</style>
