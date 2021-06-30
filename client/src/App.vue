<template>
  <v-app>
    <!-- NavBar -->
    <navbar/>

    <v-main class="main">
      <!-- Log's page -->
      <sendLog/>

    </v-main>

  </v-app>
</template>

<script>

import sendLog from './views/sendLog.vue';
import navbar from './components/navBar.vue';
export default {
  name: 'App',

  components: {
    sendLog,
    navbar
  }
};
</script>

<style scoped>
  .main{
    padding:0 !important;
    margin: 0 !important;
    min-height: 800px;
    background-color: rgb(231, 227, 227);

  }
</style>
