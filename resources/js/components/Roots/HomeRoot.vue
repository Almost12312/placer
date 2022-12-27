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
import {mapState} from "vuex";

export default {
    name: "HomeRoot",

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
            if (this.$store.state.userinfo.id !== undefined) {
                this.$store.dispatch('GET_USERINFO')
            }
        },
    },

    computed: {
        ...mapState({
            userinfo: state => state.userinfo
        })
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
