<template>
    <div class="function__button buttons__prev">
        <button class="cancel__btn">Отменить</button>
        <button class="cancel__btn" @click="addAdvert(advertisement, inputs_info_data, images_data)" id="addRedaction">Редактировать</button>
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
                id: '',
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
            advertisement.id = 12
            advertisement.title = inputs_info_data.title,
            advertisement.content = inputs_info_data.content,
            advertisement.location = inputs_info_data.location,
            advertisement.price = parseInt(inputs_info_data.price)
            advertisement.images_ids = images_data.map(({id}) => (id))


            axios.post('/advertisement/create', advertisement)

            console.log(advertisement.images_ids)
            console.log(typeof advertisement.images_ids)
        }
    }
}
</script>

<style>
    .buttons__prev {
        margin-top: 100px;
    }
</style>
