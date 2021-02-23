<template>
  <v-app>
    <v-main>
      <Header ref="header" v-if="$route.fullPath != '/'"/>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>

import Header from './components/Header';

export default {
  name: 'App',

  components: {
    Header
  }
};
</script>
