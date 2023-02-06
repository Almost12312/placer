<template>
    <div>
        <advertisement-container
            page="favorites"
        >

        </advertisement-container>
    </div>
</template>

<script>

import AdvertisementContainer from "../AdvertisementContainer.vue";
import {mapState} from "vuex";

export default {
    name: "FavoritesRoot",

    methods: {
        getUser() {
            if (!this.$store.state.userinfo.id) {
                this.$store.dispatch('GET_USERINFO')
            }
        },
    },

    computed: {
        ...mapState({
            userinfo: state => state.userinfo
        })
    },

    components: {
        AdvertisementContainer
    },

}
</script>

<style>

</style>
