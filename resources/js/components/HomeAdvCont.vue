<template>
    <div>
        <div class="advertisement__container" id="js_advert" @click="target">
            <advertisement
                v-for="adv in allAdv"
                v-bind:adv-info="adv"
                      :is-home="isHome"
            ></advertisement>
        </div>
        <div class="loadMore">
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

    export default {
        name: "AdvertisementContainer",

        data() {
            return {
                allAdv: [],
                isHome: true,
                start: 0,
                perPage: 2
            }
        },

        methods: {
            loadAdv()
            {
                let advStatus = {
                    status: 1
                }

                axios.post('/load-adv', advStatus)
                    .then((response) => {
                        this.allAdv = response.data.data
                    })
            },

            target(event)
            {
                let target = event.target;

                if (target.closest('.openAdv'))
                {
                    let id = target.closest('.advertisement').dataset.id

                    location.href = `/advertisement/` + id + `/view`

                }   else
                {
                    return
                }
            },

            async getMore() {
                let load = {
                    start: this.start,
                    end: this.end,
                    perPage: this.perPage
                }

                try {
                    const data = await axios.post('/getAdv', load)
                                            .then(response => {
                                                this.allAdv.push(response.data.data)
                                                console.log(response.data.data)

                                                this.start += this.perPage
                                            })
                } catch (e) {
                    alert(e)
                }
            },

            setLoadingObserver() {
                const loadObserver = new IntersectionObserver(enteries => {
                    enteries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                    this.getMore()
                                    this.page++
                                }, 1000)
                        }
                    })
                })

                loadObserver.observe(document.querySelector('.loadSvg'))
            }

        },

        mounted() {
            // this.loadAdv()
            this.getMore()
            this.setLoadingObserver()
        },

        components: {
            Advertisement
        }
    }
</script>

<style>

</style>
