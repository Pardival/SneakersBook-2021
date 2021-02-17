<template>
    <div>
        <v-row class="ma-10">
            <v-col xs="12" sm="7" md="8">
                <ParagraphBio :title="sneakersData.title" :description="sneakersData.description" />
                <Galery :images="sneakersData.imgGalery"/>
            </v-col>
            <v-col xs="12" sm="5" md="4">
                <SneakersBioCard :data="sneakersData" />
                <v-btn class="mt-10"
                      color="accent"
                      elevation="2">Apporter vos sources !</v-btn>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import SneakersBioCard from '@/components/SneakersBioCard.vue'
    import ParagraphBio from '@/components/ParagraphBio.vue'
    import Galery from '@/components/Galery.vue'

    export default {
        name: 'Sneakers',
            components: {
                SneakersBioCard,
                ParagraphBio,
                Galery
        },

        data: () => ({
            /* Contient les informaitons sur les sneakers */
            sneakersData : {
                    id: "xxx",
                    name : "Inertia",
                    modele : "Yezzy Boost 700",
                    code: "775-SNK",
                    release: "2002",
                    price: "200",
                    urlImg: "https://cdn.flightclub.com/TEMPLATE/135739/1.jpg",
                    title : "La chaussure de Kany WEST ! ",
                    description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus placeat debitis  laborios am aliquam odit! Quis modi enim animi eius, quas similique quae commodi in, adipisci  blanditiis inventore sequi voluptatibus eveniet!",
                    company: [
                        {
                            id: "142",
                            name : "Yeezy",
                            title: "La chaussure de Kany WEST ! ",
                            description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus placeat debitis  laborios am aliquam odit! Quis modi enim animi eius, quas similique quae commodi in, adipisci  blanditiis inventore sequi voluptatibus eveniet!"
                        }
                    ],

                    imgGalery: [
                        {
                            id: "454",
                            urlImg: "https://cdn.flightclub.com/TEMPLATE/135739/1.jpg"
                        },

                        {
                            id: "478",
                            urlImg: "https://cdn.flightclub.com/TEMPLATE/135739/1.jpg"
                        }
                    ]
            }
        }),
    }
</script>