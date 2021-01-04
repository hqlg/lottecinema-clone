<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(cinemas.length)" entrie="cinema" />
    <div>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Name</th>
            <th id="name">Slug</th>
            <th id="area">Area</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(cinema, index) in cinemas" :key="cinema.id">
              <td>{{ ++index }}</td>
              <td>{{ cinema.name }}</td>
              <td>{{ cinema.slug }}</td>
              <td>{{ cinema.area_id }}</td>
              <td>
                <list-edit-form path="/admin/cinemas" :model-id="cinema.id" />
              </td>
              <td>
                <list-delete-form path="/admin/cinemas" :model-id="cinema.id" />
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
import axios from "axios";

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
    cinemas: {
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
  data() {
    return {
      cinemasData: null,
    };
  },
  created() {
    axios
      .get("/admin/cinemas")
      .then((res) => {
        console.log("res", res);
      })
      .catch((err) => {
        console.log("err", err);
      });
  },
};
</script>

<style>
</style>
