<template>
    <section class="cabinet__container">
        <profile-container
            :userinfo="userinfo"
        >
        </profile-container>
        <article class="advertisements__container">

            <router-view
                @remove="remove"
            >
            </router-view>

        </article>
    </section>
</template>

<script>

import ProfileContainer from "../ProfileContainer";
import AdvertisementContainer from "../AdvertisementContainer";
import {mapState} from "vuex";
import axios from "axios";

export default {
    name: "CabinetRoot",

    // data() {
    //     return {
    //         userinfo: {
    //             default() {
    //                 return {}
    //             }
    //         },
    //     }
    // },

    props: {
        url: {
            type: String,
            default() {
                return '';
            }
        }
    },

    methods: {
        remove(advInfo) {
            console.log("самый верxний уровень" + advInfo)
        },

        getUser() {
            this.$store.dispatch('GET_USERINFO')
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
        ProfileContainer, AdvertisementContainer
    }
}
</script>

<style>

</style>
