<template>
  <layout :title="title">
    <show-empty-message v-if="isEmptyArray(movies.length)" entrie="movie" />
    <div v-else>
      <the-title :title="title" />
      <the-alert :successMessage="successMessage" />
      <div class="container-fluid">
        <table class="table">
          <thead class="table-primary">
            <th id="id">ID</th>
            <th id="name">Name</th>
            <th id="price">Price</th>
            <th id="img_url">Image Url</th>
            <th id="movie_url">Movie Url</th>
            <th id="release_date">Realse Date</th>
            <th id="duration">Duration</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr v-for="(movie, index) in movies" :key="movie.id">
              <td>{{ counter(index) }}</td>
              <td>{{ movie.name }}</td>
              <td>{{ movie.price }}</td>
              <td>
                <img class="wh-100" :src="movie.img_url" :alt="movie.name" />
              </td>
              <td>
                <img :src="movie.movie_url" :alt="movie.name" class="wh-100" />
              </td>
              <td>{{ movie.release_date }}</td>
              <td>{{ movie.duration }} minutes</td>
              <td>{{ movie.is_showing }}</td>
              <td>
                <list-edit-form path="/admin/movies" :model-id="movie.id" />
              </td>
              <td>
                <list-delete-form path="/admin/movies" :model-id="movie.id" />
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
  name: "MovieListPage",
  components: {
    ListDeleteForm,
    ListEditForm,
    Layout,
    TheTitle,
    ShowEmptyMessage,
    TheAlert,
  },
  props: {
    movies: {
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
