<template>
    <div>

        <div>{{ item.name }}</div>

        <div v-if="getFirstImageSrc">
            <img :src="getFirstImageSrc" alt="">
        </div>

        <div @click="remove">&times;</div>

    </div>
</template>

<script>
export default {
    name: "AdItem",
    computed: {
        getFirstImageSrc() {
            return this.item.images.length ? this.item.images[0].src : null;
        }
    },
    methods: {
        remove() {
            this.$emit('remove', this.item);
        }
    },
    props: ["item"]
}
</script>

<style scoped>

</style>
