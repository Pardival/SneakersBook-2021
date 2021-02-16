<style scoped>
    .indenter {text-indent: 20px};
</style>

<template>
<div>
    <p class="text-lg-h3 text-md-h3 text-sm-h5">{{title}}</p>
    <p class="subtitle-1 text-md-h6 indenter">{{description}}</p>
</div>
</template>

<script>
    export default {
        props: ['title', 'description'],
}
</script>