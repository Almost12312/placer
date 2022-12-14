<template>
    <div class="intro">
        <div class="hello" v-if="username !== undefined">Добропожаловать, <h2>{{ username + '!'}}</h2></div>
        <div class="hello" v-else>Добропожаловать!</div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "HomeHello",

    props: {
        username: {
            type: String,
            default() {
                return undefined
            }
        }
    }
}
</script>

<style>

</style>
