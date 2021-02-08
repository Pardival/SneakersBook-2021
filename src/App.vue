<template>
  <v-app>

    <Header/>

    <v-main>
      <v-row>
        <v-col><SneakersCard/></v-col>
        <v-col><SneakersCard/></v-col>
        <v-col><SneakersCard/></v-col>
        <v-col><SneakersCard/></v-col>
    </v-row>
    </v-main>
  </v-app>
</template>

<script>

import SneakersCard from './components/SneakersCard';
import Header from './components/Header';

export default {
  name: 'App',

  components: {
    SneakersCard,
    Header
  },

  data: () => ({
    //
  }),
};
</script>
