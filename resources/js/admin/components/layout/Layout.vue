<template>
  <body id="page-top">
    <div id="wrapper">
      <the-sidebar />
      <div id="content-wrapper" class="d-flex flex-column">
        <div class="content">
          <the-header />
          <slot />
        </div>
        <the-footer />
      </div>
    </div>
  </body>
</template>

<script>
import TheFooter from "./TheFooter.vue";
import TheHeader from "./TheHeader.vue";
import TheSidebar from "./TheSidebar.vue";
export default {
  components: { TheHeader, TheSidebar, TheFooter },
  props: {
    title: String,
  },
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = title;
      },
    },
  },
};
</script>

<style>
</style>
