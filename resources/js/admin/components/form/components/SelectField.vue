<template>
  <div class="form-group">
    <label>{{ label }}</label>
    <select
      v-if="isEdit"
      :name="fieldName"
      class="form-control"
      :id="label + 'Id'"
    >
      <option>Choose an {{ label }}</option>
      <option :value="itemWillChange.id">{{ itemWillChange.name }}</option>
      <option :value="item.id" v-for="item in data" :key="item.id">
        {{ item.name }}
      </option>
    </select>
    <select v-else :name="fieldName" class="form-control" :id="label + 'Id'">
      <option>Choose an {{ label }}</option>
      <option :value="item.id" v-for="item in data" :key="item.id">
        {{ item.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      type: Array,
      required: true,
      default: [],
    },
    fieldName: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      require: true,
    },
    isEdit: Boolean,
    itemWillChange: Object,
  },
};
</script>

<style>
</style>
