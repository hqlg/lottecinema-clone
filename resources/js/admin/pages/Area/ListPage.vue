<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(areas.length)" entrie="area" />
    <div v-else>
      <the-title :title="title" />
      <div v-if="successMessage" class="alert alert-success">
        {{ successMessage }}
      </div>
      <the-alert :error="error" :message="message" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Name</th>
            <th scope="col">Slug</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(area, index) in areas" :key="area.id">
              <td>
                {{ ++index }}
              </td>
              <td>{{ area.name }}</td>
              <td>{{ area.slug }}</td>
              <td>
                <list-edit-form path="/admin/areas" :model-id="area.id" />
              </td>
              <td>
                <list-delete-form path="/admin/areas" :model-id="area.id" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </layout>
</template>

<script>
import FormMethod from "../../components/common/FormMethod.vue";
import Layout from "../../components/layout/Layout";
import ShowEmptyMessage from "../../components/form/components/ShowEmptyMessage.vue";
import TheTitle from "../../components/ui/TheTitle.vue";
import { reconfirm, isEmptyArray } from "../../helpers";
import ListDeleteForm from "../../components/form/ListDeleteForm";
import ListEditForm from "../../components/form/ListEditForm";

export default {
  name: "AreaListPage",
  components: {
    ListEditForm,
    ListDeleteForm,
    Layout,
    TheTitle,
    FormMethod,
    ShowEmptyMessage,
  },
  props: {
    areas: {
      type: Array,
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
    successMessage: String,
  },
  methods: {
    reconfirm,
    isEmptyArray,
    deleteArea(id) {
      this.$inertia.delete(`/admin/areas/${id}`);
    },
  },
};
</script>

<style>
</style>
