<script setup>
import { ref, onMounted, computed } from "vue";
import { useApiManager } from "../../composables/apiManager";

const { initApi, apiGET, apiPOST } = useApiManager();

const users = ref([]);
const currentuser = ref(null);

onMounted(async () => {
  users.value = await apiGET("users/");
  console.info(users.value);
});

console.log("side bar loaded");
</script>

<template>
  <v-navigation-drawer expand-on-hover rail>
    <v-select
      v-if="!currentuser"
      :items="users"
      v-model="currentuser"
      item-title="username"
      return-object
    >
    </v-select>
    <v-list>
      <v-list-item
        v-if="currentuser"
        prepend-avatar="https://randomuser.me/api/portraits/women/22.jpg"
        v-bind:title="currentuser.username"
        v-bind:subtitle="currentuser.email"
      ></v-list-item>

      <v-divider></v-divider>
    </v-list>

    <v-list density="compact" nav>
      <v-list-item
        prepend-icon="mdi-view-dashboard-variant-outline"
        title="My Dashboard"
        to="/about"
      >
      </v-list-item>
      <v-list-item
        prepend-icon="mdi-account-multiple"
        title="Insights"
        to="/about"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-account-group-outline"
        title="Teams"
        to="/about"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-trophy-outline"
        title="Leaderboard"
        to="/about"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-flag-checkered"
        title="Goals"
        to="/about"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-export-variant"
        title="Share"
        to="/about"
      ></v-list-item>
      <v-divider></v-divider>
    </v-list>

    <template v-slot:append>
      <v-divider></v-divider>
      <v-list-item
        prepend-icon="mdi-cart"
        title="About"
        to="/about"
      ></v-list-item>
      <v-spacer></v-spacer>
    </template>
  </v-navigation-drawer>
</template>
