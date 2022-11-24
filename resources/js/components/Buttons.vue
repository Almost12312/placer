<template>
    <div class="function__button buttons__prev">
        <button class="cancel__btn cancelPrew" @click="cancel">Отменить</button>
        <button class="cancel__btn redPrew" @click="addAdvert" id="addRedaction">Отправить</button>
    </div>
</template>

<script>

import axios from "axios";
import {forEach} from "lodash";
import advertisement from "./advertisement";


export default {
    name: "Buttons",

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
        getAdv(status) {
            let advertisement = {
                title: this.inputs_info_data.title,
                content: this.inputs_info_data.content,
                location: this.inputs_info_data.location,
                price: parseInt(this.inputs_info_data.price),
                images_ids: this.images_data.map(({id}) => (id)),
                status: status
            }

            return advertisement
        },

        addAdvert() {

            axios.post('/advertisement/create', this.getAdv(1))
                .then((response) => {

                    if (response.data.success) {
                        alert("Вы успешно загрузили объявление")
                        setTimeout(location.href = response.data.redirect, 5000)
                    }
                })

        },

        cancel() {

            axios.post('/advertisement/create', this.getAdv(1))
                 .then((response) => {
                     if (response.data.success) {
                         location.href = '/cabinet'
                     }
                 })
        }
    }
}
</script>

<style>
    .buttons__prev {
        margin-top: 100px;
    }
</style>
