<template>
    <div class="inputSearch__container">
        <div class="search">
            <input v-model="searchInput" type="text" placeholder="Найти">
            <img  src="/images/search.svg" alt="search">
        </div>
        <div class="suggestions__container">
            <a @click="wordsSearch(item)" v-for="(item, id) in suggestions">
                {{ item.suggestion }}
            </a>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "Search",

    data() {
        return {
            searchInput: '',
            suggestions: []
        }
    },

    methods: {
        getSearch() {
            if (this.searchInput !== '') {
                let search = {
                    str: this.searchInput
                }

                axios.post('/search', search)
                    .then((res) => {
                        if (!(res.data.end))
                        {
                            this.suggestions = res.data.data
                        }   else {
                            this.suggestions = {}
                        }
                    });
            }
        },

        wordsSearch(sug) {
            let suggestion = {
                str: sug.suggestion,
                id: sug.id
            }

            axios.post('/search/advertisement', suggestion)
                 .then((res) => {
                     console.log(res)
                 })
        },
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
