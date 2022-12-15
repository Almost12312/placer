<template>
    <div>
        <home-hello
            :username="userinfo.name"
        >

        </home-hello>

        <div class="posts">
            <div class="advertisement__homeContainer" id="homeAdvCont">
                <advertisement-container
                    :userinfo="userinfo"
                    :is-home="isHome"
                >

                </advertisement-container>
            </div>
        </div>
    </div>

</template>

<script>

import HomeHello from "./HomeHello";
import AdvertisementContainer from "./AdvertisementContainer";
import axios from "axios";

export default {
    name: "HomeRoot",

    data() {
        return {
            userinfo: {},
            isHome: true
        }
    },

    props: {
        url: {
            type: String,
            default() {
                return '/getAdv';
            }
        }
    },

    methods: {
        getUser() {
            axios.get('profile')
                .then(response => {
                    this.userinfo.name = response.data.name
                })
        }
    },

    mounted() {
        this.getUser()
    },

    components: {
        HomeHello,
        AdvertisementContainer
    }
}
</script>

<style>

</style>
