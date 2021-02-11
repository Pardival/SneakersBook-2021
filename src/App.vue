<template>
  <v-app>
    <v-main>
      <Header/>
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

        <!-- En tendance -->
        <v-row justify="center">
            <p class="text-h4">
              En tendance
            </p>
          </v-row>
          <v-row justify="center" class="mb-10">
            <v-col md="4" sm="6" xs="12" v-for="card in sneakersData" v-bind:key="card.name+' '+card.modele">
              <SneakersCard :srcImg="card.urlImg" 
                            :releaseDate="card.release" 
                            :name="card.name" 
                            :modele="card.modele" 
                            :company="card.company" />
            </v-col>
          </v-row>

          <!-- Book -->
          <v-row justify="center">
            <p class="text-h3">
              Book.
            </p>
          </v-row>
          <v-row justify="center" class="mb-10 mr-10 ml-10">
            <v-col md="4" sm="6" xs="12" v-for="card in sneakersData" v-bind:key="card.name+' '+card.modele">
              <SneakersCard :srcImg="card.urlImg" 
                            :releaseDate="card.release" 
                            :name="card.name" 
                            :modele="card.modele" 
                            :company="card.company" />
            </v-col>
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
    sneakersData : [
      {
        name : "Inertia",
        modele : "Yezzy Boost 700",
        release: "2002",
        urlImg: "https://cdn.flightclub.com/TEMPLATE/135739/1.jpg",
        company: [
          {
            name : "Addidas"
          },
          {
            name : "Yezzy"
          }
        ]
      },
      {
        name : "Chunky Dunky",
        modele : "Dunk Low",
        release: "2002",
        urlImg: "https://images.wave.fr/images//nike_sb_dunk_low_ben_jerrys_date_sortie_infos_1.jpg",
        company: [
          {
            name : "Nike"
          },
          {
            name : "Ben & Jerry's"
          }
        ]
      },

      {
        name : "Syracuse",
        modele : "Dunk Low",
        release: "2002",
        urlImg: "https://www.lesitedelasneaker.com/wp-content/images/2020/02/nike-dunk-low-syracuse-cu1726-101.jpg",
        company: [
          {
            name : "Nike"
          }
        ]
      }
    ]
  }),

  methods:{
        log(value){
          console.log(value)

        }
    }
};
</script>
