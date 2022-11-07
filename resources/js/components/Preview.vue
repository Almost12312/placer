<template>
    <div class="advertisement">
        <div class="files__download__container">
            <div class="files__download">
                <div class="images__preview">
                    <div class="files__download__button">
                        <input @change="upload" type="file" name="file" id="image" class="upload__img" placeholder="Выберите файл" multiple>
                        <label class="file__label" for="file"><img class="plus" src="/images/plus.svg" alt=""></label>
                    </div>
                    <div  v-for="(image, id) in images" class="preview__container">
                        <img :src="image.url" alt="preview" class="adv_img" :data-id="image.id">
                        <div  class="cancelX__container">
                            <div @click="deleteImage(id)" class="cancelX">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="advertisement__description">
            <h3 class="ad__title">{{inputs_info_data.title ? inputs_info_data.title : "Заголовок"}}</h3>
            <h4 class="ad__content">{{inputs_info_data.content ? inputs_info_data.content : "Описание"}}</h4>
            <div class="location_price">
                <h5 class="ad__location">{{inputs_info_data.location ? inputs_info_data.location : "Местоположение"}}</h5>
                <h6 class="ad__price">
                    <p class="num__price">{{inputs_info_data.price ? (inputs_info_data.price == 0 ? "Бесплатно" : inputs_info_data.price)  : "Цена в"}}</p>
                </h6>
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

    props: {
        inputs_info_data: {
            type: Object,
            default() {
                return {}
            }
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

        deleteImage(id) {

            this.images.splice(id, 1);
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
