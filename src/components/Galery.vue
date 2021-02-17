<template>
    <v-row>
        <v-col md="4" sm ="6" xs="12" v-for="image in images" v-bind:key="image.urlImg">
            <v-img
                :src="image.urlImg"
                dark>
            </v-img>
        </v-col>
    </v-row>
</template>

<script>
    export default {
        props: ['images'],
}
</script>