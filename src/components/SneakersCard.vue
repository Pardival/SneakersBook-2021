<template>
    <v-card elevation="3" class="wrap">
      <v-img height="210"
             :src="dataSneakers.urlImg"></v-img>
      <v-card-title class="wrap subtitle-2 font-weight-black">{{dataSneakers.name}}</v-card-title>
      <v-card-subtitle>
        Par {{dataSneakers.companyName}}
      </v-card-subtitle>
       <v-card-actions>
          <v-spacer></v-spacer>
          <div class="ma-2">{{dataSneakers.release_date}}</div>
      </v-card-actions>
    </v-card>
</template>

<script>
  export default {
    name: 'SneakersCard',
    props: ['dataSneakers'],
    data: () => ({
    })
  }
</script>

<style>
  .wrap {
    word-break: break-all;
  }
</style>