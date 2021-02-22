<template>
    <v-card elevation="3">
      <v-img height="250"
             :src="srcImg"></v-img>
      <v-card-title class="subtitle-2 font-weight-black">{{modele}} {{name}}</v-card-title>
      <v-card-subtitle>
        Par <span v-for="ep in company" v-bind:key="ep.name"> X {{ep.name}}</span>
      </v-card-subtitle>
       <v-card-actions>
          <v-spacer></v-spacer>
          <div class="ma-2">{{releaseDate}}</div>
      </v-card-actions>
    </v-card>
</template>

<script>
  export default {
    name: 'SneakersCard',
    props: ['srcImg', 'releaseDate', 'name', 'modele', 'company'],
    data: () => ({
    })
  }
</script>