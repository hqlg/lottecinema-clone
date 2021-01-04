<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(rooms.length)" entrie="room" />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Room</th>
            <th scope="col">Cinema</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(room, index) in rooms" :key="room.id">
              <td>{{ counter(index) }}</td>
              <td>{{ room.name }}</td>
              <td>{{ room.cinema_id }}</td>
              <td>
                <list-edit-form path="/admin/rooms" :model-id="room.id" />
              </td>
              <td>
                <list-delete-form path="/admin/rooms" :model-id="room.id" />
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
  name: "RoomListPage",
  components: {
    ListDeleteForm,
    ListEditForm,
    Layout,
    TheTitle,
    ShowEmptyMessage,
    TheAlert,
  },
  props: {
    rooms: {
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
