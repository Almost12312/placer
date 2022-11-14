<template>
    <div class="ads__redactor">
        <h3>Редактировать объявление</h3>

        <div class="advertisement__form">
            <inputs-advert v-bind:inputs_info_data="inputs_info_cont"
                           v-bind:thisAdv="thisAdv"
            ></inputs-advert>
            <preview v-bind:inputs_info_data="inputs_info_cont"
                           :images="images"
                           :thisAdv="thisAdv"

            >

            </preview>
        </div>

        <buttons v-bind:inputs_info_data="inputs_info_cont"
                 :images_data="images"
                 :thisAdv="thisAdv"
        ></buttons>
    </div>



</template>

<script>

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

            images: this.imagesProps
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
                    price: ""
                }
            }
        },

        imagesProps: {
            type: Array,
            default() {
                return [];
            }
        }

        // thisAdvImgs: {
        //     type: Array,
        // }
    },

    methods: {
    },

    components: {
        Preview, InputsAdvert, Buttons
    }
}
</script>

<style>

</style>
