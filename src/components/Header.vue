<template>
    <v-toolbar class="mb-6" color="">
      <v-toolbar-title>SneakersBook</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-text-field filled
                        solo-inverted
                        class="mx-4 d-none d-lg-block .d-none d-xl-flex d-md-flex d-sm-flex"
                        flat
                        hide-no-data
                        hide-details
                        label="Rechercher"
                        dense
                        :v-model="research">
        </v-text-field>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
    </v-toolbar>
</template>

<script>
  export default {
    data: () => ({
      research : ""
    })
  }
</script>