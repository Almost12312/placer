<template>
    <template>
        <div class="advertisement__container" id="js_advert" v-on:click="target">
            <advertisement
                v-for="adv in allAdv"
                v-bind:adv-info="adv"
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

                    if (target.closest('.openAdv'))
                    {
                        let id = target.closest('.advertisement').dataset.id

                        location.href = `/advertisement/` + id + `/view`

                    }   else
                    {
                        return
                    }
                },

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

</template>

<script>
export default {
    name: "HomeAdvCont"
}
</script>

<style>

</style>
