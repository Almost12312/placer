<template>
    <section class="cabinet__container">
        <profile></profile>
        <article class="advertisements__container">
            <p class="adv__con__title">Мои объявления</p>

            <router-view
                @remove="remove"
            >
            </router-view>

        </article>
    </section>
</template>

<script>

import Profile from "./Profile";
import AdvertisementContainer from "./AdvertisementContainer";

export default {
    name: "Cabinet",

    methods: {
      remove(advInfo) {
          console.log("САМЫЙЦ ВЕРХНИЙ КОМПОНЕНТ ", advInfo.id)
      }
    },

    components: {
        Profile, AdvertisementContainer
    }
}
</script>

<style>

</style>
