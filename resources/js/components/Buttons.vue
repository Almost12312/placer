<template>
    <div class="function__button buttons__prev">
        <button class="cancel__btn cancelPrew" @click="cancel">Отменить</button>
        <button class="cancel__btn redPrew" @click="addAdvert(advertisement, inputs_info_data, images_data)" id="addRedaction">Отправить</button>
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
                id: this.thisAdv.id,
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

        images_data: {
            type: Array,
            default() {
                return undefined;
            }
        }
    },

    methods: {
        addAdvert(advertisement, inputs_info_data, images_data) {

            advertisement.title = inputs_info_data.title
            advertisement.content = inputs_info_data.content
            advertisement.location = inputs_info_data.location
            advertisement.price = parseInt(inputs_info_data.price)
            advertisement.images_ids = images_data.map(({id}) => (id))


            axios.post('/advertisement/create', advertisement)
                .then((response) => {

                    if (response.data.success) {
                        alert("Вы успешно загрузили объявление")
                        setTimeout(location.href = response.data.redirect, 5000)
                    }
                })

        },

        cancel() {
            location.href = '/cabinet'
        }
    }
}
</script>

<style>
    .buttons__prev {
        margin-top: 100px;
    }
</style>
