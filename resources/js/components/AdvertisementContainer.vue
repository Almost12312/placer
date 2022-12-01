<template>
    <div class="advertisement__container" id="js_advert" v-on:click="target">
        <advertisement
            v-for="adv in allAdv"
            v-bind:adv-info="adv"
            @remove="remove"
            @complete="complete"
        ></advertisement>
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
          allAdv: []
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

            if (target.closest('.redBtn'))
            {
                let id = target.closest('.advertisement').dataset.id

                location.href = `/advertisement/` + id + `/redaction`

            }

            if (target.closest('.openAdv'))
            {
                let id = target.closest('.advertisement').dataset.id

                location.href = `/advertisement/` + id + `/view`

            }   else
            {
                return
            }
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

            this.$emit('remove', advInfo)

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
