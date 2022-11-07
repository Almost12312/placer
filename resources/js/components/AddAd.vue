<template>
    <div>

        добавить ad

        <div v-for="(image, index) in images_data">
            <img :src="image.url" alt="">
            <div @click="deleteImage(index)">Удалить</div>
        </div>

    </div>
</template>

<script>

import axios from 'axios'

export default {

    data() {
        return {

        }
    },

    props: {
        images_data: {
            type: Array,
            default() {
                return {}
            }
        }
    },

    methods: {
        deleteImage(index) {

            this.images_data.splice(index, 1);
        },

        // deleteAll() {
        //
        //     this.images_data = [];
        // }
    },
}
</script>
