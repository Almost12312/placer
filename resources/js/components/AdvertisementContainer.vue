<template>
    <div>
        <header class="subtitle__filters">
            <h3 class="home__subtitle">Объявления</h3>
            <div class="filters">

                <h3 v-if="sort === 1">Самые новые</h3>
                <h3 v-if="sort === 2">По возрастанию</h3>
                <h3 v-if="sort === 3">По убыванию</h3>

                <svg id="more__list" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     viewBox="0 0 129 78" xml:space="preserve">

                        <g>
                            <g>
                                <path class="st0" d="M157-71c0,81.2,0,162.3,0,243.6c-62,0-123.9,0-186,0c0-81.1,0-162.3,0-243.6C32.9-71,95-71,157-71z M64.5,52
                                    C49,36,34,20.6,19.2,5C13.1-1.5,9.3-1.8,3.3,5C-1,9.9-1.2,13.3,3.4,18.1c18.1,18.7,36.3,37.5,54.4,56.2c4.7,4.9,8.1,4.9,12.8,0
                                    c17.6-18.2,35.1-36.5,52.9-54.5c6.1-6.2,6.8-9.9-0.1-16.4c-4.7-4.4-8-4.6-12.5,0C96.1,18.7,81.2,34.1,66.3,49.5
                                    C65.7,50.2,65.2,51,64.5,52z"/>
                                <path class="st1" d="M64.5,52c0.7-1,1.2-1.8,1.8-2.5C81.2,34.1,96.1,18.7,111,3.3c4.5-4.6,7.8-4.4,12.5,0
                                    c6.9,6.5,6.1,10.3,0.1,16.4c-17.8,18-35.3,36.3-52.9,54.5c-4.7,4.9-8.1,4.9-12.8,0C39.7,55.5,21.6,36.8,3.4,18.1
                                    C-1.2,13.3-1,9.9,3.3,5c6-6.8,9.8-6.5,15.9,0C34,20.6,49,36,64.5,52z"/>
                            </g>
                        </g>
                    </svg>

                <div class="filters__options">
                    <div class="simple__sorting">
                        <label class="filter__option"
                               :class="{filter__active: sort === 1}"
                        >
                            <span>Самые новые</span>
                            <svg id="new" viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>new-line</title>
                                <path class="clr-i-outline clr-i-outline-path-1" d="M34.59,23l-4.08-5,4-4.9a1.82,1.82,0,0,0,.23-1.94A1.93,1.93,0,0,0,32.94,10h-31A1.91,1.91,0,0,0,0,11.88V24.13A1.91,1.91,0,0,0,1.94,26H33.05a1.93,1.93,0,0,0,1.77-1.09A1.82,1.82,0,0,0,34.59,23ZM2,24V12H32.78l-4.84,5.93L32.85,24Z"></path><polygon class="clr-i-outline clr-i-outline-path-2" points="9.39 19.35 6.13 15 5 15 5 21.18 6.13 21.18 6.13 16.84 9.39 21.18 10.51 21.18 10.51 15 9.39 15 9.39 19.35"></polygon><polygon class="clr-i-outline clr-i-outline-path-3" points="12.18 21.18 16.84 21.18 16.84 20.16 13.31 20.16 13.31 18.55 16.5 18.55 16.5 17.52 13.31 17.52 13.31 16.03 16.84 16.03 16.84 15 12.18 15 12.18 21.18"></polygon><polygon class="clr-i-outline clr-i-outline-path-4" points="24.52 19.43 23.06 15 21.84 15 20.37 19.43 19.05 15 17.82 15 19.78 21.18 20.89 21.18 22.45 16.59 24 21.18 25.13 21.18 27.08 15 25.85 15 24.52 19.43"></polygon>
                                <rect x="0" y="0" fill-opacity="0"/>
                            </svg>
                            <input v-model="sort" type="radio" :value="1" hidden>
                        </label>
                        <label class="filter__option"
                               :class="{filter__active: sort === 2}"
                        >
                            <span>По возрастанию цены</span>
                            <svg version="1.1" id="arrow__up" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 330 330" xml:space="preserve">
                                <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
                                    C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
                                    c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z"/>
                            </svg>
                            <input v-model="sort" type="radio" :value="2" hidden>
                        </label>
                        <label class="filter__option"
                               :class="{filter__active: sort === 3}"
                        >
                            <span>По убыванию цены</span>
                            <svg id="arrow__down" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 330 330" xml:space="preserve">
                                <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
                                    C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
                                    c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z"/>
                            </svg>
                            <input v-model="sort" type="radio" :value="3" hidden>
                        </label>
                    </div>
                    <div class="hard__sorting">
                        <h4 class="sortNumberRange__title">Цена (₽)</h4>

                        <div class="priceRange">
                            <div class="inputContainer">
                                <input v-model.number="rangeMin" @change="sortingRange()" type="number" placeholder="Min">
                            </div>
                            <div class="inputContainer">
                                <input v-model.number="rangeMax" @change="sortingRange()" type="number" placeholder="Max">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div v-if="$route" class="advertisement__container" id="js_advert" @click="target">
            <cabinet-advert
                v-for="adv in filterAdvs"
                v-bind:adv-info="adv"
                :key="adv.id"

                :favorite="findFavorite(adv.id)"
                :user-id="userinfo.id"

                @remove="remove"
                @complete="complete"
            ></cabinet-advert>
        </div>
        <div v-else class="advertisement__container" id="js_advert" @click="target">
            <advertisement
                v-for="adv in filterAdvs"
                v-bind:adv-info="adv"
                :key="adv.id"
                :favorite="findFavorite(adv.id)"
                :user-id="userinfo.id"

                @remove="remove"
                @complete="complete"
            ></advertisement>
        </div>
        <div class="loadMore" v-show="more === true">
            <svg class="loadSvg">
                <circle cx="50" cy="50" r="40" fill="none" stroke="#000" stroke-width="5" stroke-dashoffset="0"
                ></circle>
            </svg>
        </div>
    </div>
</template>

<script>
// @remove="remove"
import axios from "axios";
import Advertisement from "./advertisement";
import cabinetAdvert from "./cabinetAdvert";
import Tags from "./Tags.vue";


export default {
    name: "AdvertisementContainer",

    data() {
        return {
            allAdv: [],
            filterAdvs: [],
            tags: [],
            favorites: [],
            start: 0,
            perPage: 6,
            more: true,
            sort: 1,
            rangeMin: null,
            rangeMax: null,
        }
    },

    props: {
        url: {
            type: String,
            default() {
                return '/getAdv';
            }
        },

        smallPhoto: {
            type: Boolean,
            default() {
                return false
            },
        },

        userinfo: {
            type: Object,
            default() {
                return {}
            },
        },

        options: {
            type: Object,
            default() {
                return null
            },
        },

        page: {
            type: String,
            default() {
                return 'home'
            },
        }
    },

    methods: {

        target(event)
        {
            let target = event.target;
            let id = null;

            if (target.closest('.openAdv'))
            {
                let open = target.closest('.openAdv')

                if (open.closest('.img__open'))
                {
                    id = open.closest('.img__open').parentNode.dataset.id

                }   else
                {
                    id = target.closest('.openAdv').parentNode.dataset.id
                }

                location.href = `/advertisement/` + id + `/view`

            }   else if (target.closest('.redBtn'))
            {
                let id = target.closest('.redBtn').closest('.cabinet_adv').dataset.id
                // console.log(id)
                location.href = `/advertisement/` + id + `/redaction`

            } else
            {
                return
            }
        },

        async getMore() {
            let load = {
                start: this.start,
                perPage: this.perPage,
                page: this.page,
                options: this.options,
                w: this.smallPhoto ? 80 : null,
                h: this.smallPhoto ? 80 : null

            }

            try {
                const data = await axios.post('/getAdv', load)
                    .then((response) => {

                        this.start += this.perPage;

                        if (!(response.data.end))
                        {
                            if (response.data.favorites) {
                                this.pushing(this.favorites, response.data.favorites);
                            }

                            this.pushing(this.allAdv, response.data.advs.data)
                            this.sortingRange()
                        }   else
                        {
                            this.more = false;
                            return alert("Объявления закончились");
                        }
                    })
            } catch (e) {
                return alert(e)
            }
        },

        setLoadingObserver() {
            const loadObserver = new IntersectionObserver(enteries => {
                enteries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (this.more === true) {
                            setTimeout(async () => {
                                await this.getMore();
                            }, 500)
                        }

                    }
                })
            })

            loadObserver.observe(document.querySelector('.loadMore'))
        },

        sorting()
        {
            switch (this.sort) {
                case 1:
                    this.filterAdvs.sort((a, b) => {
                        return a.date - b.date
                    })
                    break

                case 2:
                    this.filterAdvs.sort((a, b) => {
                        return a.price - b.price
                    });
                    break

                case 3:
                    this.filterAdvs.sort((a, b) => {
                        return b.price - a.price
                    })
            }
        },

        sortingRange() {
            if (this.rangeMin === null && this.rangeMax === null)
            {
                return this.filterAdvs = this.allAdv
            }

            if (this.rangeMin === null) {
                return this.filterAdvs = this.allAdv.filter(item => item.price >= 0 && item.price < this.rangeMax)
            }

            if (this.rangeMax === null) {
                return this.filterAdvs = this.allAdv.filter(item => item.price >= this.rangeMin && item.price <= 1000000000)
            }
        },

        pushing(arr, res)
        {
            for (let item of Object.keys(res)) {
                arr.push(res[item])
            }
        },

        findFavorite(id) {
            return this.favorites.includes(id);
        },

        remove(advInfo)
        {
            console.log(advInfo)
            let index = this.allAdv.indexOf(advInfo)

            this.allAdv.splice(index, 1)

            console.log(index)

            let delAdvert = {
                id: advInfo.id
            }

            this.$store.commit('delPub')

            axios.post('/advertisement/delete', delAdvert)
        },

        complete(advInfo)
        {
            let index = this.allAdv.indexOf(advInfo)

            this.allAdv.splice(index, 1)

            let info = {
                id: advInfo.id,
                status: 1
            }

            this.$store.commit('delPub')

            axios.post('/advertisement/change-status', info)
                .then((response) => {
                    if (response.data.success === true)
                    {
                        alert('Завершено')

                    }  else
                    {
                        alert("Что-то пошло не так")
                    }
                })
        },
    },

    watch: {
        sort() {
            this.sorting()
        },
    },

    mounted() {
        // this.getUser()
        this.getMore()
        this.setLoadingObserver()
    },

    components: {
        Advertisement, cabinetAdvert, Tags
    }
}
</script>

<style>

</style>
