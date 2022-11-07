<template>
    <div>

        <div>

<!--            <div v-for="(image, index) in images">-->
<!--                <img :src="image.url" alt="">-->
<!--                <div @click="deleteImage(index)">Удалить</div>-->
<!--            </div>-->

        </div>

        <label>
            Загрузить файлы
            <input type="file" hidden multiple @change="upload">
        </label>

<!--        <button @click="deleteAll">Удалить все</button>-->

        <AddAd :images_data="images"></AddAd>

    </div>
</template>

<script>

import axios from 'axios'
import AddAd from './AddAd'

export default {
    name: "Test",

    data() {
        return {
            images: [],
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

                        this.images.push(response.data);
                    });
            }

        },


    },

    components: {
        AddAd
    }
}
</script>
