<template>
    <div class="user_menu">
        <div class="avatar">
            <img v-if="userinfo.url !== null" :src="userinfo.url" alt="аватарка">
            <div id="head__avatar" v-show="userinfo.url === null" class="withoutRegPhoto__bg">
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
            this.$store.dispatch('GET_USERINFO')
        }
    },

    computed: {
        setUser() {
            this.userinfo = this.$store.getters.USERINFO
        },
    },

    mounted() {
        this.getUser()
    }
}
</script>

<style>

</style>
