<template>
    <div class="search">
        <input v-model="searchInput" type="text" placeholder="Найти">
        <img src="/images/search.svg" alt="search">
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "Search",

    data() {
        return {
            searchInput: ''
        }
    },

    methods: {
        getSearch() {
            // if (this.searchInput !== '') {
                let search = {
                    str: this.searchInput
                }

                axios.post('/search', search)
                    .then((res) => {
                        console.log(res)
                    });
            // }
        }
    },

    watch: {
        searchInput() {
            this.getSearch()
        },
    }
}
</script>

<style>

</style>
