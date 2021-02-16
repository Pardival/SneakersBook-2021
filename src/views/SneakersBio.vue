<template>
    <div>
        <v-row class="ma-10">
            <v-col xs="12" sm="7" md="8">
                <ParagraphBio />
                <Galery />
            </v-col>
            <v-col xs="12" sm="5" md="4">
                <SneakersBioCard />
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
        
        })
    }
</script>