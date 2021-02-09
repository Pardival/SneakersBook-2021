<template>
  <v-app>
    <v-main>
      <Header/>
      <v-container class=" lighten-5">
        <v-row justify="center">
          <v-col md="4" sm="6" xs="12"><SneakersCard/></v-col>
          <v-col md="4" sm="6" xs="12"><SneakersCard/></v-col>
          <v-col md="4" sm="6" xs="12"><SneakersCard/></v-col>
          <v-col md="4" sm="6" xs="12"><SneakersCard/></v-col>
          <v-col md="4" sm="6" xs="12"><SneakersCard/></v-col>
          <v-col md="4" sm="6" xs="12"><SneakersCard/></v-col>
        </v-row>
      </v-container>
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
