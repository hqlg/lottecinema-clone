<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(seats.length)" entrie="seat" />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Seat Number</th>
            <th id="name">Room ID</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(seat, index) in seats" :key="seat.id">
              <td>{{ counter(index) }}</td>
              <td>{{ seat.seat_number }}</td>
              <td>{{ seat.room_id }}</td>
              <td>
                <list-edit-form path="/admin/seats" :model-id="seat.id" />
              </td>
              <td>
                <list-delete-form path="/admin/seats" :model-id="seat.id" />
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
  name: "SeatListPage",
  components: {
    ListDeleteForm,
    ListEditForm,
    Layout,
    TheTitle,
    ShowEmptyMessage,
    TheAlert,
  },
  props: {
    seats: {
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
