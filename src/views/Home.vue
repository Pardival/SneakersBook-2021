<template>
  <v-container class="lighten-5">
        <v-autocomplete filled
                        solo-inverted
                        class="d-flex d-sm-none d-xs-flex  mb-5"
                        flat
                        hide-no-data
                        hide-details
                        label="Rechercher"
                        dense>
        </v-autocomplete>


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
    sneakersData : null,
    companyData : null
  }),

  mounted() {
    var _this = this // Instance Vue

    /* get SneakersCards data */
    axios.get('http://localhost:8081/ws.php?action=getSneakersCards')
      .then(function(response) {
        _this.sneakersData = response.data
      })
      .catch(function(error) {
        console.log(error)
      })

      /* get company data */
    axios.get('http://localhost:8081/ws.php?action=getCompanyForSneakersCards')
      .then(function(response) {
        _this.companyData = response.data
      })
      .catch(function(error) {
        console.log(error)
      })

      // for(let rangSneakers = 0; rangSneakers < this.rangSneakers.length; rangSneakers++) {
      //   for (let rangCompany = 0; rangCompany < this.rangCompany.length; rangCompany++) {
      //     if (this.sneakersData[rangSneakers].id_sneakers == this.companyData[rangCompany].fk_sneakers) {
        
      //     }
      //   }
      // }
  },

  methods:{
        log(value){
          console.log(value)

        }
    }
}
</script>
