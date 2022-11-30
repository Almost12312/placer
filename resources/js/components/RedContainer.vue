<template>
    <div class="redContainer">

        <categories
            :this-adv="thisAdv"
        ></categories>

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
            images: [],
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
                    category: '',
                    tags: []
                }
            }
        }
    },

    methods: {
        loadImgs()
        {
            let id = {
                id: this.thisAdv.id
            }

            axios.post('/preview/get-imgs', id)
                .then((response) => {
                    if(response.data.data){
                        this.images = response.data.data
                    }
                })
        }
    },

    mounted() {
        this.loadImgs()
    }
}
</script>

<style>

</style>
