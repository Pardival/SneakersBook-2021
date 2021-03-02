<template>
  <div>
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
                        v-model="research" @input="refreshSneakersCards">
        </v-text-field>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
    </v-toolbar>
  <v-container class="lighten-5">
        <v-text-field filled
                        solo-inverted
                        class="d-flex d-sm-none d-xs-flex  mb-5"
                        flat
                        hide-no-data
                        hide-details
                        label="Rechercher"
                        dense
                        v-model="research"
                        @input="refreshSneakersCards">
        </v-text-field>


        <!-- En tendance  (Chaussures les plus vue durant les dernières 24h -->
        <!-- <v-row justify="center"> -->
            <!-- Sous Titre -->
            <!-- <p class="text-h4">
              En tendance
            </p>
          </v-row>
          <v-row justify="center" class="mb-10"> -->
            <!-- Sneakers card-->
            <!-- <v-col md="4" sm="6" xs="12" v-for="card in sneakersData" v-bind:key="card.name+' '+card.modele">
              <SneakersCard :srcImg="card.urlImg" 
                            :releaseDate="card.release" 
                            :name="card.name" 
                            :modele="card.modele" 
                            :company="card.company" />
            </v-col>
          </v-row> -->

          <!-- Book (le dictionnaire) -->
          <v-row justify="center">
            <!-- Sous Titre -->
            <p class="text-h3">
              Book.
            </p>
          </v-row>
          <v-row justify="center" class="mb-10 mr-10 ml-10">
            <v-col md="4" sm="6" xs="12" v-for="card in sneakersData" v-bind:key="card.name+' '+card.modele">
            <!-- Sneakers card-->
              <SneakersCard :dataSneakers="card" />
            </v-col>
          </v-row>
    </v-container>
  </div>
</template>

<script>
// @ is an alias to /src
import SneakersCard from '@/components/SneakersCard.vue'    // Carte de la sneakers
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

export default {
  name: 'Home',       // root name
  components: {
    SneakersCard      // component used
  },

  data: () => ({
    /* Contient les informaitons sur les sneakers */
    sneakersData : null,        // Contient les données des sneakersCards
    companyData : null,         // Contient les données des company
    research: ""              // Contient la chaine de caractère permettant de filtrer sur les sneakers que l'on recherche
  }),

  mounted() {
    var _this = this // Instance Vue

    /* get SneakersCards data */
    axios.get('http://localhost:8081/ws.php?action=getSneakersCards&research='+_this.research)
      .then(function(response) {
        _this.sneakersData = response.data
      })
      .catch(function(error) {
        console.log(error)
      })
  },

  methods:{
    refreshSneakersCards : function() {
       var _this = this // Instance Vue

      /* get SneakersCards data */
      axios.get('http://localhost:8081/ws.php?action=getSneakersCards&research='+_this.research)
        .then(function(response) {
          _this.sneakersData = response.data
        })
        .catch(function(error) {
          console.log(error)
        })   
    },

    log(value){
        console.log(value)
    }
  }
}
</script>
