<template>
    <div class="advertisement__form">
        <inputs-advert v-bind:inputs_info_data="inputs_info_cont"></inputs-advert>
        <preview v-bind:inputs_info_data="inputs_info_cont"></preview>
    </div>

</template>

<script>

import Preview from "./Preview";
import InputsAdvert from "./InputsAdvert";

export default {
    name: "InputPrevCont",

    data() {
        return {
            inputs_info_cont: {
                title: "",
                content: "",
                location: "",
                price: "",
                tags: ""
            }
        }
    },

    methods: {
    },

    components: {
        Preview, InputsAdvert
    }
}
</script>

<style>

</style>
