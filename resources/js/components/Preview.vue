<template>
    <div class="advertisement adv__preview">
        <div class="files__download__container">
            <div class="files__download">
                <div class="images__preview">
                    <div class="files__download__button">
                        <input @change="upload" type="file" name="file" id="image" class="upload__img" placeholder="Выберите файл" multiple>
                        <label class="file__label" for="file"><img class="plus" src="/images/plus.svg" alt=""></label>
                    </div>
                    <div v-for="(image, id) in this.images" class="preview__container">

                        <img :src="image.url" alt="preview" class="adv_img" :data-id="image.id">
                        <div @click="deleteImage(id)" class="cancelX__container">
                            <div  class="cancelX">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="advertisement__description">
<!--            <h3 class="ad__title">{{inputs_info_data.title ? inputs_info_data.title : "Заголовок"}}</h3>-->
            <h3 v-if="inputs_info_data.title && inputs_info_data.title.length > 0" class="ad__title">{{inputs_info_data.title ? inputs_info_data.title : "Заголовок"}}</h3>
            <h3 v-if="inputs_info_data.title && inputs_info_data.title.length === 0" class="ad__title">Заголовок</h3>

            <div class="ad__content">{{inputs_info_data.content ? inputs_info_data.content : "Тут ваше описание"}}</div>

            <!--            <h4 v-if="inputs_info_data.content.length > 0" class="ad__content">{{inputs_info_data.content ? inputs_info_data.content : "Описание"}}</h4>-->
<!--            <h4 v-if="inputs_info_data.content.length === 0 && thisAdv.title.length > 0" class="ad__content">{{thisAdv.content}}</h4>-->

            <div class="location_price">
                <h5 class="ad__location">{{inputs_info_data.location ? inputs_info_data.location : "Местоположение"}}</h5>
<!--                <h5 v-if="inputs_info_data.location.length > 0" class="ad__location">{{inputs_info_data.location ? inputs_info_data.location : "Местоположение"}}</h5>-->
<!--                <h5 v-if="inputs_info_data.location.length === 0" class="ad__location">{{thisAdv.location}}</h5>-->
                <div class="ad__price">
                    <p v-if="inputs_info_data.price && (parseInt(inputs_info_data.price) === 0 || inputs_info_data.price.length === 0)" class="no__price">
                        {{inputs_info_data.price.length === 0 ? "Цена в ₽" : "Бесплатно" }}
                    </p>
                    <p v-else-if="inputs_info_data.price" class="num__price">{{inputs_info_data.price > 0 ? inputs_info_data.price : "Цена в"}}</p>
                    <p v-else-if="!(inputs_info_data.price) || inputs_info_data.price.length === 0" class="num__price">Цена в</p>

                </div>
            </div>
        </div>
    </div>

</template>

<script>

import axios from 'axios'

export default {

    data() {
        return {
            adContentHeight: ""
        }
    },

    props: {
        inputs_info_data: {
            type: Object,
            default() {
                return {}
            }
        },

        images: {
            type: Array,
            default() {
                return [];
            }
        },

        thisAdv: {
            type: Object
        },

        // thisAdvImgs: {
        //     type: Array,
        // }
    },

    methods: {

        upload(event) {
            const files = event.target.files;

            if (files.length === 0) {
                return;
            }

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

    },

    components: {}
}
</script>


<style>
    .adv__preview {
        margin-left: 250px;
        margin-top: 70px;
    }

    .adv__preview {
    }
</style>
