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
                    category: ''
                }
            }
        }
    },
}
</script>

<style>

</style>
