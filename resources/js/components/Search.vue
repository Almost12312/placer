<template>
    <div class="inputSearch__container">
        <div class="search">
            <input @keyup.enter="toSearch(searchInput)" v-model="searchInput" type="text" placeholder="Найти">
            <img @click="toSearch(searchInput)" src="/images/search.svg" alt="search">
        </div>
        <div class="suggestions__container">
            <a
                v-for="(item, id) in suggestions"
                @click="toSearch(item.suggestion)"
            >
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
            suggestions: [],
        }
    },

    methods: {
        getSearch() {
            if (this.searchInput !== '') {
                let search = {
                    str: this.searchInput
                }

                axios.post('/suggestions', search)
                    .then((res) => {
                        if (!(res.data.end))
                        {
                            document.querySelector('.suggestions__container').style.display = 'flex'
                            this.suggestions = res.data.data
                        }   else {
                            this.suggestions = {}
                        }
                    });
            }
        },

        toSearch(link) {
            // console.log(link)
            location.href = `/search/` + link
        },

        // linkStyle(str) {
        //     console.log(str)
        //
        //     let inputText = new Set (this.searchInput.split(''))
        //     let strSepare = str.split('')
        //     let res = []
        //
        //     for (let i = 0; i < strSepare.length; i++) {
        //         if (inputText.includes(strSepare[i])) {
        //             res.push(strSepare[i])
        //         }
        //     }
        //
        //     // let xer = new Set(strSepare.filter(el => input.has(el)))
        //     // console.log(xer.join(''))
        //     //
        //     return res.join('')
        // },
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
