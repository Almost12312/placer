<template>
    <div class="advertisement__container" id="js_advert" v-on:click="target">
        <advertisement
            v-for="adv in allAdv"
            v-bind:adv-info="adv"
            :key="adv.id"

        ></advertisement>
    </div>
</template>

<script>

import axios from "axios";
import Advertisement from "./advertisement";

export default {
    name: "AdvertisementContainer",

    data() {
        return {
            allAdv: []
        }
    },

    methods: {
        loadAdv()
        {
            let advStatus = {
                status: 3
            }

            axios.post('/load-adv', advStatus)
                .then((response) =>
                {
                    this.allAdv = response.data.data
                })
        },

        target(event)
        {
            let target = event.target;

            if (target.closest('.advertisement'))
            {
                let id = target.closest('.advertisement').dataset.id

                let idAdv = {
                    idAd: id
                }

                //create post for redirect to redirect adv page

                // location.href = `/advertisement/` + id + `/redaction`

            } else
            {
                return
            }
        },

        // remove(advInfo)
        // {
        //     let index = this.allAdv.indexOf(advInfo)
        //
        //     this.allAdv.splice(index, 1)
        //
        //     let delAdvert = {
        //         id: advInfo.id
        //     }
        //
        //     axios.post('/advertisement/delete', delAdvert)
        // },
        //
        // publish(advInfo)
        // {
        //     let info = {
        //         id: advInfo.id,
        //         status: advInfo.status
        //     }
        //
        //     axios.post('/advertisement/change-status', info)
        //         .then((response) =>
        //         {
        //             if (response.data.success)
        //             {
        //                 let index = this.allAdv.indexOf(advInfo)
        //                 this.allAdv.splice(index, 1)
        //
        //                 alert('Опубликовано')
        //
        //             } else
        //             {
        //                 alert("Что-то пошло не так")
        //             }
        //         })
        // }

        // remove(advInfo) {
        //     console.log(advInfo)
        //     let index = this.allAdv.indexOf(advInfo)
        //
        //     this.allAdv.splice(index, 1)
        //
        //     console.log(index)
        //
        //     let delAdvert = {
        //         id: advInfo.id
        //     }
        //
        //     axios.post('/advertisement/delete', delAdvert)
        // }

    },

    mounted() {
        this.loadAdv()
    },

    components: {
        Advertisement
    }
}
</script>

<style>

</style>
