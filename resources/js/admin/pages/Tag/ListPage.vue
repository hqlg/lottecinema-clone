<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(tags.length)" entrie="tag" />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Time</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(tag, index) in tags" :key="tag.id">
              <td>{{ counter(index) }}</td>
              <td>{{ tag.name }}</td>
              <td>
                <list-edit-form path="/admin/tags" :model-id="tag.id" />
              </td>
              <td>
                <list-delete-form path="/admin/tags" :model-id="tag.id" />
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
import TheAlert from "../../components/form/components/TheAlert.vue";

export default {
  name: "TagListPage",
  components: {
    ListDeleteForm,
    ListEditForm,
    Layout,
    TheTitle,
    ShowEmptyMessage,
    TheAlert,
  },
  props: {
    tags: {
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
