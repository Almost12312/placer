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

                >

                </advertisement-container>
            </div>
        </div>
    </div>

</template>

<script>

import HomeHello from "../HomeHello";
import AdvertisementContainer from "../AdvertisementContainer";
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

    },

    mounted() {
    },

    components: {
        HomeHello,
        AdvertisementContainer
    }
}
</script>

<style>

</style>
