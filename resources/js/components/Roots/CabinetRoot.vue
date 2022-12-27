<template>
    <section class="cabinet__container">
        <profile-container
            :userinfo="userinfo"
        >
        </profile-container>
        <article class="advertisements__container">
            <div class="buyer__infographics">
<!--                <section class="splide homeSlider" aria-label="Splide Basic HTML Example">-->
<!--                    <div class="splide__track">-->
<!--                        <ul class="splide__list">-->
<!--                            <li class="splide__slide">-->
<!--                                <img src='images/infographics5-1.svg' alt="infographics 1">-->
<!--                            </li>-->
<!--                            <li class="splide__slide">-->
                <img src='images/infographics4.svg' alt="infographics 3">
                <img src='images/infographics3-2.svg' alt="infographics 2">
                <!--                            </li>-->
                <!--                            <li class="splide__slide">-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </section>-->
            </div>
            <router-view
                @remove="remove"
                @compe
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
            console.log("самый верxний уровень")
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
