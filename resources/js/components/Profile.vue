<template>
    <article class="cabinet">
        <aside class="cabinet__menu">
            <header>
                <div class="profile">
                    <div class="avatar">
                        <img src="/images/me.jpg" alt="">
                    </div>
                    <p class="name">{{userinfo.name}}</p>
                    <ul class="profile__subtitle">
                        <li><p class="profile__intro">{{ userinfo.city }}</p></li>
                        <li><div class="circle"></div></li>
                        <li><p class="profile__intro">{{ userinfo.created_at }}</p></li>
                    </ul>
                    <p class="profile__intro">Объявлений: <span class="countAdvert">{{ userinfo.advertisements }}</span></p>
                </div>
            </header>
        </aside>
    </article>
</template>

<script>

import axios from "axios";

export default {
    name: "Profile",

    data() {
        return {
            userinfo: {}
        }
    },

    methods: {
        getUser() {
            axios.post('/profile')
                 .then(response => {
                     this.userinfo = response.data.data
                 })
        }
    },

    mounted() {
        this.getUser()
    }
}
</script>

<style scoped>

</style>
