<template>
    <div class="intro">
        <div class="hello" v-if="userinfo.name !== null">Добропожаловать, <h2>{{ userinfo.name + '!'}}</h2></div>
        <h2 v-else>Добропожаловать!</h2>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "HomeHello",

    data() {
        return {
        userinfo: {
            name: '',

            default() {
                return {
                    name: ''
                }
            }
        }
    }
    },

    methods: {
        getUser() {
            axios.get('profile')
                 .then(response => {
                     this.userinfo.name = response.data.name
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
