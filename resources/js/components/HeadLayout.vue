<template>
    <div class="user_menu">
        <div class="avatar">
            <img v-if="userinfo.url !== null" :src="userinfo.url" alt="аватарка">
            <div v-show="userinfo.url === null" class="withoutRegPhoto__bg">
                <div v-if="userinfo.name" class="withoutRegPhoto">{{ userinfo.name.substring(0, 1).toUpperCase() }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "HeadLayout",

    data() {
        return {
            userinfo: {}
        }
    },

    methods: {
        getUser() {
            axios.get('/profile')
                 .then(response => {
                     this.userinfo = response.data
                 })
        }
    },

    mounted() {
        this.getUser()
    }
}
</script>

<style>

</style>
