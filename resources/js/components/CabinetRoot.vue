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
            }
        }
    },

    methods: {
        remove(advInfo) {
          console.log("САМЫЙЦ ВЕРХНИЙ КОМПОНЕНТ ", advInfo.id)
        },

        getUser() {
            axios.get('/profile')
                .then(response => {
                    this.userinfo = response.data
                })
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
