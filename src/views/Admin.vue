<template>
    <div>
        <v-row class="ma-10">
            <v-col md="8">
                <FormSneakers />
            </v-col>

            <v-col md="4">
                s
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import FormSneakers from '@/components/FormSneakers.vue'

    export default {
        name: 'Admin',
        components : {
            FormSneakers
        },

        data: () => ({
            dataForm : {
                modele : [
                    {
                        name : "Dunk Low",
                        id : "145",
                    },

                    {
                        name : "Air Jordan 1 high",
                        id : "145",
                    }
                ],

                marques : [
                    {
                        name : "Nike",
                        id : "0",
                    },

                    {
                        name : "Adidas",
                        id : "1",
                    }
                ]
            }
        })
    }
</script>