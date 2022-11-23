<template>
    <article class="cabinet">
        <aside class="cabinet__menu">
            <header>
                <div class="profile">
                    <div class="avatar">
                        <input id="uplAvatar" type="file" name="uplAvatar" @change="uplAvatar" hidden>
                        <label for="uplAvatar" class="uplAvatarLabel" >
                            <svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="16" height="16" id="icon-bound" fill="none" />
                                <path d="M3.294,7.706l1.416,1.416L7,6.828V16h2V6.828l2.294,2.294l1.416-1.416L8,3L3.294,7.706z M0,2h16V0H0V2z" />
                            </svg>
                        </label>

                        <img v-if="userinfo.url" :src="userinfo.url" alt="аватарка">
                        <div v-else class="withoutRegPhoto__bg">
                            <div v-if="userinfo.name" class="withoutRegPhoto">{{ userinfo.name.substring(0, 1).toUpperCase() }}</div>
                        </div>
                    </div>
                    <p v-if="userinfo.name && userinfo.lastname" class="name">
                        {{ userinfo.name + ' ' + userinfo.lastname.substring(0, 1).toUpperCase() }}.
                    </p>
                    <ul class="profile__subtitle">
                        <li><p class="profile__intro">{{ userinfo.city }}</p></li>
                        <li><div class="circle"></div></li>
                        <li><p class="profile__intro">{{ userinfo.created_at }}</p></li>
                    </ul>
                    <p class="profile__intro">Объявлений: <span class="countAdvert">{{ userinfo.advertisements }}</span></p>
                </div>
            </header>

            <div class="advertisement__status__container">
                <a class="adv__status" href="">
                    <div class="adv__status__active"><p class="status__after">Активные объявления ({{userinfo.advertisements}})</p></div>
                </a>
<!--                <a class="adv__status"><div><p>Черновики</p></div></a>-->
                <router-link to="/foo" class="adv__status"><div><p>Черновики</p></div></router-link>
                <a class="adv__status"><div><p>История объявлений</p></div></a>
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
import VueRouter from "vue-router";

export default {
    name: "Profile",

    data() {
        return {
            userinfo: {
            }
        }
    },

    methods: {
        getUser() {
            axios.post('/profile')
                 .then(response => {
                     this.userinfo = response.data.data
                 })
        },

        uplAvatar() {
            let input = document.querySelector('#uplAvatar');

            let fd = new FormData
            fd.append('file', input.files[0])
            console.log(fd)

            axios.post('/file/upload', fd)
                 .then(response => {
                     console.log(response.data.id)

                     this.userinfo.url = response.data.url

                     let avatarInfo = {
                        id: response.data.id
                     }
                     axios.post('/file/upload-avatar', avatarInfo)
                 })
        },

        randomBg() {
            document.querySelector('.withoutRegPhoto__bg').style.backgroundColor = '#'+Math.random().toString(16).substring(2, 6)
            // document.querySelector('.withoutRegPhoto').textContent = this.userinfo.name.substring(0, 1).toUpperCase()
        },

        createAdv() {
            location.href = '/advertisement/create'
        }
    },
    //
    // created() {
    // },

    mounted() {
        this.getUser()
        this.randomBg()
    }
}
</script>

<style>

</style>
