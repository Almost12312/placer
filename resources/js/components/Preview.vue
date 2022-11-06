<template>
    <div class="files__download">

        <div class="images__preview">
            <div class="files__download__button">
                <input @change="upload" type="file" name="file" id="image" class="upload__img" placeholder="Выберите файл" multiple>
                <label class="file__label" for="file"><img class="plus" src="/images/plus.svg" alt=""></label>
            </div>
            <div  v-for="(image, index) in images" class="preview__container">
                <img :src="image.url" alt="preview" class="adv_img" data-id="">
                <div  class="cancelX__container">
                    <div @click="deleteImage(index)" class="cancelX">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'
// import AdvImgs from "./AdvImgs";

export default {

    data() {
        return {
            images: [],
        }
    },

    methods: {

        upload(event) {
            const files = event.target.files;

            if (files.length === 0) {
                return;
            }

            // let file = files[0];

            for (let i = 0; i < files.length; i++)
            {
                let fd = new FormData;
                fd.append('file', files[i]);

                axios.post('/file/upload', fd)
                    .then((response) => {
                        this.images.push(response.data)
                    })
            }
        },

        deleteImage(index) {

            this.images.splice(index, 1);
        },
        //
        // deleteAll() {
        //
        //     this.images = [];
        // },
        //
        // greet() {
        //
        // }
    },

    // components: {
    //     AdvImgs
    // }
}
</script>


<style scoped>

</style>
