<template>
  <layout :title="title">
    <show-empty-message
      v-if="isEmptyArray(giftCategories.length)"
      entrie="gift category"
    />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr
              v-for="(giftCategory, index) in giftCategories"
              :key="giftCategory.id"
            >
              <td>{{ ++index }}</td>
              <td>{{ giftCategory.name }}</td>
              <td>
                <list-edit-form
                  path="/admin/gift-categories"
                  :model-id="giftCategory.id"
                />
              </td>
              <td>
                <list-delete-form
                  path="/admin/gift-categories"
                  :model-id="giftCategory.id"
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
    giftCategories: {
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
