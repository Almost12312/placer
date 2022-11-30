<template>
    <div class="ads__redactor">
        <h3 class="adPrew__title">Редактировать объявление</h3>

        <div class="advertisement__form">
            <inputs-advert v-bind:inputs_info_data="inputs_info_cont"
                           v-bind:thisAdv="thisAdv"
            ></inputs-advert>
            <preview v-bind:inputs_info_data="inputs_info_cont"
                           :images="this.images"
                           :thisAdv="thisAdv"

            >

            </preview>
        </div>

        <buttons v-bind:inputs_info_data="inputs_info_cont"
                       :images_data="this.images"
                       :thisAdv="thisAdv"
        ></buttons>
    </div>



</template>

<script>

import axios from "axios";
import Preview from "./Preview";
import InputsAdvert from "./InputsAdvert";
import Buttons from "./Buttons";




export default {
    name: "InputPrevCont",

    data() {
        return {
            inputs_info_cont: {
                title: this.thisAdv.title,
                content: this.thisAdv.content,
                location: this.thisAdv.location,
                price:  this.thisAdv.price,
                tags: ""
            },
        }
    },

    props: {
        thisAdv: {
            type: Object,
            default() {
                return {
                    id: null,
                    title: "",
                    content: "",
                    location: "",
                    price: "",
                    tags: []
                }
            }
        },

        images: []


        // thisAdvImgs: {
        //     type: Array,
        // }
    },

    methods: {
        loadImgs()
        {
            let id = {
                id: this.thisAdv.id
            }

            axios.post('/preview/get-imgs', id)
                 .then((response) => {
                     if(response.data.data){
                         this.images = response.data.data
                     }
                 })
        }
    },

    components: {
        Preview, InputsAdvert, Buttons
    },

    mounted() {
        this.loadImgs()
    }
}
</script>

<style>

</style>
