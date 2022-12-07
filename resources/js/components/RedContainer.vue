<template>
    <div class="redContainer">

        <categories v-model="thisAdv.category" />

        <div class="redForm">
            <input-prev-cont
                :this-adv="thisAdv"
                :images="images"
            ></input-prev-cont>
        </div>

    </div>
</template>

<script>
import Categories from "./Categories";
import InputPrevCont from "./InputPrevCont";
import axios from "axios";

export default {
    name: "RedContainer",

    components: {
        Categories, InputPrevCont
    },

    data() {
        return {
            images: this.imagesProp
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
                    category: null,
                    tags: []
                }
            }
        },

        imagesProp: {
            type: Array,
            default() {
                return [];
            }
        }
    },

    methods: {
        // loadImgs()
        // {
        //     let id = {
        //         id: this.thisAdv.id
        //     }
        //
        //     axios.post('/preview/get-imgs', id)
        //         .then((response) => {
        //             if(response.data.data){
        //                 this.images = response.data.data
        //             }
        //         })
        // }
    },

    mounted() {
        // this.loadImgs()
    },

    beforeRouteLeave(to, from, next)
    {
        for (let i = 0; i < 10; i++)
        {
            console.log('Srabotalo')
        }
        next()
    }
}
</script>

<style>

</style>
