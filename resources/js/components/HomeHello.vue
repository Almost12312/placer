<template>
    <div class="intro">
        <div class="hello" v-if="userinfo.name !== undefined">Добропожаловать, <h2>{{ userinfo.name + '!'}}</h2></div>
        <div class="hello" v-else>Добропожаловать!</div>
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
