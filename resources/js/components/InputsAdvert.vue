<template>
    <div class="inputs_container">
        <input type="text" v-model="inputs_info_data.title" class="red__input title__red" id="title__red" placeholder="Заголовок">
        <input type="text" v-model="inputs_info_data.content" class="red__input content__red" id="content__red" placeholder="Описание">
        <input type="text" v-model="inputs_info_data.location" class="red__input location__red" id="location__red" placeholder="Расположение">
        <input type="number" v-model="inputs_info_data.price" class="red__input price__red" id="price__red" placeholder="Цена">
        <textarea class="tags" v-model="inputs_info_data.tags" name="tags" id="" placeholder="Теги"></textarea>
    </div>
</template>

<script>

import Preview from "./Preview.vue";

export default {
    name: "InputsAdvert",

    data() {
        return {
        }
    },

    props: {
        inputs_info_data: {
            type: Object
        }
    },

    methods: {

    }

    // components: {
    //     Preview
    // }
}

</script>

<style>

</style>
