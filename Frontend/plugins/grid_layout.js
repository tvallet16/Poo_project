import { GridItem, GridLayout } from "../node_modules/vue3-drr-grid-layout";
import "vue3-drr-grid-layout/dist/style.css";

import { defineNuxtPlugin } from "nuxt/app";

export default defineNuxtPlugin((nuxtApp) => {
  nuxtApp.vueApp.use([GridLayout, GridItem]);
});
