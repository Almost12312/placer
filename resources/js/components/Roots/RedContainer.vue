<template>
    <div class="redContainer">

        <categories v-model="thisAdv.category"></categories>

        <div class="redForm">
            <input-prev-cont
                :this-adv="thisAdv"
                :images="images"
            ></input-prev-cont>
        </div>

    </div>
</template>

<script>
import Categories from "../Categories.vue";
import InputPrevCont from "../InputPrevCont.vue";
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
