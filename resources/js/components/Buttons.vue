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

    data() {
        return {
            isSave: false
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
                return [];
            }
        }
    },

    methods: {
        getAdv(status) {
            let advertisement = {
                id: this.thisAdv.id,
                title: this.inputs_info_data.title,
                content: this.inputs_info_data.content,
                location: this.inputs_info_data.location,
                price: parseInt(this.inputs_info_data.price),
                images_ids: this.images_data.map(({id}) => (id)),
                category: parseInt(this.thisAdv.category),
                status: status,
                tags: this.thisAdv.tags
            }

            return advertisement
        },

        addAdvert() {
            if (this.inputs_info_data.title === "" || this.inputs_info_data.content === "" ||
                this.inputs_info_data.location === "" || parseInt(this.inputs_info_data.price) === null ||
                this.inputs_info_data.images_data === "" || this.thisAdv.category === "")
            {
                alert('Не все поля заполнены')
                return
            } else
            {
                axios.post('/advertisement/create', this.getAdv(1))
                    .then((response) => {

                        if (response.data.success) {
                            alert("Вы успешно загрузили объявление")
                            setTimeout(location.href = response.data.redirect, 5000)
                        }
                    })
            }

        },

        cancel() {
            if (this.thisAdv.status !== 1)
            {
                if (this.inputs_info_data.title === '' && this.inputs_info_data.content === '' && this.inputs_info_data.price === '' && this.inputs_info_data.location === '') {
                    location.href = '/cabinet'

                } else
                {
                    axios.post('/advertisement/create', this.getAdv(2))
                        .then((response) => {
                            if (response.data.success === true) {
                                this.isSave = true
                                location.href = '/cabinet'
                            }
                        })
                }
            }   else {
                location.href = '/cabinet'
            }
        },


    },

    beforeRouteLeave(to, from, next)
    {
        if (this.isSave !== true)
        {
            console.log('asdf')
            this.cancel()
                next()
        }   else
        {
            next(false)
        }
    }
}
</script>

<style>
    .buttons__prev {
        margin-top: 100px;
    }
</style>
