<template>
    <div>

        <div>

            <div v-for="(image, index) in images">
                <img :src="image.url" alt="">
                <div @click="deleteImage(index)">Удалить</div>
            </div>

        </div>

        <label>
            Загрузить файлы
            <input type="file" hidden multiple @change="upload">
        </label>

        <button @click="deleteAll">Удалить все</button>

    </div>
</template>

<script>

import axios from 'axios'
import AddAd from './AddAd'

export default {

    data() {
        return {
            imagess: [],
        }
    },

    methods: {

        upload(event) {

            let files = event.target.files;

            for (let i = 0; i < files.length; ++i) {

                let fd = new FormData();

                fd.append('file', files[i]);

                axios.post('/file/upload', fd)
                    .then((response) => {

                        this.imagess.push(response.data);
                    });
            }

        },

        deleteImage(index) {

            this.images.splice(index, 1);
        },

        deleteAll() {

            this.images = [];
        },

        greet() {

        }
    },

    components: {
        AddAd
    }
}
</script>
