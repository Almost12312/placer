<template>
    <div class="ads__redactor">
        <h3>Редактировать объявление</h3>

        <div class="advertisement__form">
            <inputs-advert v-bind:inputs_info_data="inputs_info_cont"></inputs-advert>
            <preview v-bind:inputs_info_data="inputs_info_cont"
                            :images="images"
                            :thisAdv="thisAdv"

            >

            </preview>
        </div>

        <buttons v-bind:inputs_info_data="inputs_info_cont"
                 :images_data="images"
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
                title: "",
                content: "",
                location: "",
                price:  "",
                tags: ""
            },

            images: this.imagesProps
        }
    },

    props: {
        thisAdv: {
            type: Object
        },

        imagesProps: {
            type: Array
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
