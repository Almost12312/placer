<template>
    <div class="advertisement__container" id="js_advert" v-on:click="target">
        <advertisement
            v-for="adv in allAdv"
            v-bind:adv-info="adv"
            @remove-adv="removeAdv"
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
         loadAdv() {
             axios.post('/resource')
                  .then((response) => {
                      this.allAdv = response.data.data
                  })
         },

         target(event) {
            let target = event.target;

            if (target.closest('.redBtn')) {

                // let title = target.closest('.advertisement').querySelector('.ad__title').textContent
                // let content = target.closest('.advertisement').querySelector('.ad__content').textContent
                // let location = target.closest('.advertisement').querySelector('.ad__location').textContent
                // let price = target.closest('.advertisement').querySelector('.ad__price').textContent
                let id = target.closest('.redBtn').closest('.advertisement').dataset.id

                console.log(id)

                let idAdv = {
                    idAd: id
                }
                // let dataIdImg = target.closest('.advertisement').querySelectorAll('.adv_img');
                console.log(idAdv)

                location.href = `/advertisement/` + id + `/redaction`
            } else {
                return
            }
         },

        removeAdv(advInfo) {
            console.log(advInfo)
            let index = this.allAdv.indexOf(advInfo)

            this.allAdv.splice(index, 1)

            console.log(index)

            let delAdvert = {
                id: advInfo.id
            }

            axios.post('/advertisement/delete', delAdvert)
        }

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
