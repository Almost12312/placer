<template>
    <section class="cabinet__container">
        <profile-container
            :userinfo="userinfo"
        >
        </profile-container>
        <article class="advertisements__container">
            <p class="adv__con__title">Мои объявления</p>

            <router-view
                @remove="remove"
            >
            </router-view>

        </article>
    </section>
</template>

<script>

import ProfileContainer from "./ProfileContainer";
import AdvertisementContainer from "./AdvertisementContainer";
import axios from "axios";

export default {
    name: "CabinetRoot",

    data() {
        return {
            userinfo: {
                default() {
                    return {}
                }
            },

            try: {}
        }
    },

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
        },

        getUser() {
            axios.get('/profile')
                .then(response => {
                    this.userinfo = response.data
                })
        },

        getUser1() {
            this.$store.dispatch('GET_USERINFO')

        },

    },

    computed: {
        gets() {
            this.try = this.$store.getters.USERINFO
        },
    },

    mounted() {
        this.getUser()
        this.getUser1()
    },

    components: {
        ProfileContainer, AdvertisementContainer
    }
}
</script>

<style>

</style>
