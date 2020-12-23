require("./bootstrap");

import Vue from "vue";
import axios from "axios";
import VueRouter from "vue-router";
import routes from "./admin/routes";

window.Vue = reuqire("vue");
Vue.use(vueRouter, axios);

const router = new VueRouter({ mode: "history", routes });
new Vue(Vue.util.extend({ router })).$mount("#app");
