<template>
  <div class="form-group">
    <label :for="'input' + fieldName">{{ label }}</label>
    <input
      :name="fieldName"
      :value="value"
      :type="type"
      class="form-control"
      :id="'input' + fieldName"
    />
  </div>
</template>

<script>
export default {
  props: {
    fieldName: String,
    value: [String, Number, Array],
    type: {
      default: "text",
    },
    label: String,
  },
};
</script>

<style>
</style>
