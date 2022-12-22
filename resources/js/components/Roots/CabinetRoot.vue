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

import ProfileContainer from "../ProfileContainer";
import AdvertisementContainer from "../AdvertisementContainer";
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
            console.log("самый верзний уровень" + advInfo)
        },

        getUser() {
            this.$store.dispatch('GET_USERINFO')
        },
    },

    computed: {
        gets() {
            this.userinfo = this.$store.getters.USERINFO
        },
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
