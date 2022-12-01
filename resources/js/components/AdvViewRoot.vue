<template>
    <section class="view__adv">
        <div class="advertContainer">
            <div class="advert__images">
<!--                <Splide :options="{ rewind: false, type: 'fade'}">-->
<!--                    <SplideSlide>-->
                        <img src="/images/advertisement.jpg" alt="Sample 1">
<!--                    </SplideSlide>-->
<!--                    <SplideSlide>-->
<!--                        <img src="/images/advertisement.jpg" alt="Sample 1">-->
<!--                    </SplideSlide>-->
<!--                </Splide>-->
            </div>
            <div class="advertInformation">

                <div class="advInfoModel address">
                    <h3>Адрес</h3>
                    <h4>С. Нижние шляпки</h4>
                </div>
                <div class="advInfoModel description">
                    <h3>Описание</h3>
                    <h4>Очень круто круто круто</h4>
                </div>
                <div class="advTags">
                    <h3>Теги</h3>
                    <div class="tags__container">
                        <p class="tag">Теги</p>
                        <p class="tag">Теги</p>
                        <p class="tag">Теги</p>
                        <p class="tag">Теги</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact__ads">
            <div class="sellerCard">
                <Profile
                    :userinfo="userinfo"
                ></Profile>
            </div>

            <div class="ads">

            </div>
        </div>
    </section>
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/splide.min.css';
import '@splidejs/splide/dist/css/themes/splide-skyblue.min.css';
import Profile from "./Profile";
import axios from "axios";

export default {
    name: "AdvViewRoot",

    data() {
        return {
            userinfo: {
                type: Object,
                default() {
                    return {}
                }
            }
        }
    },

    methods: {
        getUser() {
            axios.post('/profile')
                .then(response => {
                    this.userinfo = response.data
                })
        },
    },

    components: {
        Profile, Splide, SplideSlide
    },

    mounted() {
        this.getUser()
    },
}
</script>

<style>

</style>
