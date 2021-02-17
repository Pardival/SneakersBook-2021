<template>
    <v-card
      max-width=""
      class=""
    >
      <v-img
        :src="data.urlImg"
        dark
      >
      </v-img>
  
      <v-list>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>{{data.modele}}</v-list-item-title>
            <v-list-item-subtitle>{{data.name}}</v-list-item-subtitle>
          </v-list-item-content>
  
          <v-list-item-icon>
            <v-icon>mdi-message-text</v-icon>
          </v-list-item-icon>
        </v-list-item>
        
        <v-divider></v-divider>
  
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>
              <span v-for="ep in data.company" v-bind:key="ep.id"> {{ep.name}} </span>
            </v-list-item-title>
          </v-list-item-content>
  
          <v-list-item-icon>
            <v-icon>mdi-factory</v-icon>
          </v-list-item-icon>
        </v-list-item>
  
        <v-divider></v-divider>
  
        <v-list-item>  
          <v-list-item-content>
            <v-list-item-title>Prix retail : {{data.price}} €</v-list-item-title>
          </v-list-item-content>
          
          <v-list-item-icon>
            <v-icon>mdi-currency-eur</v-icon>
          </v-list-item-icon>
        </v-list-item>
        
        <v-divider></v-divider>
  
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>Année : {{data.release}}</v-list-item-title>
          </v-list-item-content>
          
          <v-list-item-icon>
            <v-icon>mdi-calendar</v-icon>
          </v-list-item-icon>
        </v-list-item>
  
        <v-divider></v-divider>
  
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>Code :{{data.code}}</v-list-item-title>
          </v-list-item-content>
          
          <v-list-item-icon>
            <v-icon>mdi-barcode</v-icon>
          </v-list-item-icon>
        </v-list-item>
      </v-list>
    </v-card>
</template>

<script>
  export default {
    props: ['data']
  }
</script>