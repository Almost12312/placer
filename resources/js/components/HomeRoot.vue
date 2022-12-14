<template>
    <div>
        <home-hello
            :username="userinfo.name"
        >

        </home-hello>

        <div class="posts">
            <div class="advertisement__homeContainer" id="homeAdvCont">
                <home-adv-cont
                    :userinfo="userinfo"
                >

                </home-adv-cont>
            </div>
        </div>
    </div>

</template>

<script>

import HomeHello from "./HomeHello";
import HomeAdvCont from "./HomeAdvCont";
import axios from "axios";

export default {
    name: "HomeRoot",

    data() {
        return {
            userinfo: {}
        }
    },

    methods: {
        getUser() {
            axios.get('profile')
                .then(response => {
                    this.userinfo.name = response.data.name
                    this.userinfo.favorites = response.data.favorites
                })
        }
    },

    mounted() {
        this.getUser()
    },

    components: {
        HomeHello,
        HomeAdvCont
    }
}
</script>

<style>

</style>
