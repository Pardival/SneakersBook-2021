<template>
    <div>
        <v-row class="ma-10">
            <v-col xs="12" sm="7" md="8">
                <ParagraphBio />
            </v-col>
            <v-col xs="12" sm="5" md="4" ><SneakersBioCard /></v-col>
        </v-row>
    </div>
</template>

<script>
    import SneakersBioCard from '@/components/SneakersBioCard.vue'
    import ParagraphBio from '@/components/ParagraphBio.vue'

    export default {
        name: 'Sneakers',
            components: {
                SneakersBioCard,
                ParagraphBio
        },

        data: () => ({
        
        })
    }
</script>