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
import {mapState} from "vuex";

export default {
    name: "HeadLayout",

    // data() {
    //     return {
    //         userinfo: {}
    //     }
    // },

    methods: {
        getUser() {
            if (!this.$store.state.userinfo.id) {
                this.$store.dispatch('GET_USERINFO');
            }
        }
    },

    computed: {
        ...mapState({
            userinfo: state => state.userinfo
        }),
    },

    mounted() {
        this.getUser()
    }
}
</script>

<style>

</style>
