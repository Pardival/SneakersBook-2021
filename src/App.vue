<template>
  <v-app>
    <v-main>
      <Header/>
      <v-container class=" lighten-5">
        <v-autocomplete filled
                        solo-inverted
                        class="d-flex d-sm-none d-xs-flex  mb-5"
                        flat
                        hide-no-data
                        hide-details
                        label="Rechercher"
                        dense>
        </v-autocomplete>
          <v-row justify="center" v-for="card in sneakersData" v-bind:key="card.name+''+card.modele">
            <v-col md="4" sm="6" xs="12">
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
        name : "(Nom)",
        modele : "(Modèle)",
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
        name : "(Nom)",
        modele : "(Modèle)",
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
        name : "(Nom)",
        modele : "(Modèle)",
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
