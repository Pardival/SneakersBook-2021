<template>
    <form> 
        <p>Formulaire ajouter sneakers </p>
        <v-row>
            <v-col>
                    <v-text-field v-model="dataSneakersToSend.nom"
                                label="Nom de la sneakers"
                                required></v-text-field>
            </v-col>
            <v-col>
                    <v-text-field v-model="dataSneakersToSend.prixRetail"
                                label="Prix retail"
                                required></v-text-field>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <v-text-field v-model="dataSneakersToSend.urlCouverture"
                                    label="Url Image"
                                    required></v-text-field>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                    <v-text-field v-model="dataSneakersToSend.code"
                                  label="Code sneakers"
                                  required></v-text-field>
            </v-col>
            <v-col>
                    <v-select v-model="dataSneakersToSend.modele"
                              :items="modelesOptions"
                              item-text="name"
                              item-value="id"
                              filled
                              :menu-props="{ maxHeight: '400' }"
                              label="Modèle Sneakers"></v-select>

                    <v-select v-model="dataSneakersToSend.marques"
                              :items="marquesOptions"
                              item-text="name"
                              item-value="id"
                              :menu-props="{ maxHeight: '400' }"
                              label="Marques"
                              multiple
                              persistent-hint
          ></v-select>
            </v-col>
        </v-row>
        <v-btn class="mr-4"
              @click="submit">submit</v-btn>
    </form>
</template>

<script>
    export default {
        name : 'FormSneakers',
        //props: ['data'],
        data: () => ({
            marquesOptions : [
                    {
                        name : "Nike",
                        id : "0",
                    },

                    {
                        name : "Adidas",
                        id : "1",
                    }
                    
            ],
            modelesOptions : [
                    {
                        name : "Dunk Low",
                        id : "145",
                    },

                    {
                        name : "Air Jordan 1 high",
                        id : "1",
                    }
            ],

            dataSneakersToSend : {
                nom : null,
                prixRetail : null,
                urlCouverture : null,
                dateCreation : null,
                modele : null,
                code : null,
                marques : []
            }
        }),

        methods : {
            log : function(value) {
                console.log(value);
            }
        }
    }
</script>