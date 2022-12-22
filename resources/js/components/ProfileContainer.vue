<template>
    <article class="cabinet">
        <aside class="cabinet__menu">

            <profile
                :userinfo="userinfo"
            ></profile>

            <div class="advertisement__status__container" @click="target">
                <router-link to="/active" class="adv__status" href="">
                    <div class="adv__status__noActive adv__status__active">
                        <p class="status__after">Активные объявления ({{userinfo.advPublish ? userinfo.advPublish : 0}})</p>
                    </div>
                </router-link>
<!--                <a class="adv__status"><div><p>Черновики</p></div></a>-->
                <router-link to="/draft" class="adv__status">
                    <div class="adv__status__noActive">
                        <p class="status__after">Черновики ({{userinfo.advDrafts ? userinfo.advDrafts : 0}})</p>
                    </div>
                </router-link>
                <router-link to="/history" class="adv__status">
                    <div class="adv__status__noActive">
                        <p class="status__after">История объявлений</p>
                    </div>
                </router-link>
                <a class="adv__status" @click="createAdv">
                    <div class="adv__status__active">
                        <p>Добавить объявление</p>
                    </div>
                </a>
            </div>
        </aside>
    </article>
</template>

<script>

import axios from "axios";
// import Router from "./router";
import Profile from "./Profile";

export default {
    name: "ProfileContainer",

    // data() {
    //     return {
    //         userinfo: {
    //             url: null
    //         }
    //     }
    // },

    props: {
        userinfo: {
            type: Object,
            default() {
                return {}
            }
        }
    },

    methods: {

        createAdv() {
            location.href = '/advertisement/create'
        },

        target(event)
        {
            let target = event.target

            if (target.closest('.adv__status__noActive'))
            {
                let allNoActive = document.querySelectorAll('.adv__status__noActive')
                for (let i = 0; i < allNoActive.length; i++)
                {
                    allNoActive[i].classList.remove('adv__status__active')
                    target.closest('.adv__status__noActive').classList.add('adv__status__active')
                }
            }
        }
    },

    components: {
        Profile
    },
    //
    // created() {
    // },

    mounted() {

    },
}
</script>

<style>

</style>
