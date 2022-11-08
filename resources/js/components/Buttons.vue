<template>
    <div class="function__button">
        <button class="cancel__btn">Отменить</button>
        <button class="cancel__btn" @click="addAdvert(advertisement, inputs_info_data, images_data)" id="addRedaction">Редактировать</button>
        <p>{{images_data}}</p>
    </div>
</template>

<script>

import axios from "axios";
import {forEach} from "lodash";


export default {
    name: "Buttons",

    data() {
        return {
            advertisement: {
                title: "",
                content: "",
                location: "",
                price: 0,
                images_ids: []
            }
        }
    },

    props: {
        inputs_info_data: {
            type: Object,
            default() {
                return {}
            }
        },

        images_data: {
            type: Array,
            default() {
                return undefined;
            }
        }
    },

    methods: {
        addAdvert(advertisement, inputs_info_data, images_data) {
            advertisement.title = inputs_info_data.title,
            advertisement.content = inputs_info_data.content,
            advertisement.location = inputs_info_data.location,
            advertisement.price = parseInt(inputs_info_data.price)
            advertisement.images_ids = images_data.map(({id}) => (id))


            axios.post('/advertisement/create', advertisement)
                 .then((response) =>{})

            console.log(advertisement.images_ids)
            console.log(typeof advertisement.images_ids)
        }
    }
}
</script>

<style>

</style>
