<template>
    <div>
        <home-hello />

        <div class="posts">
            <div class="advertisement__homeContainer" id="homeAdvCont">
                <home-adv-cont
                >

                </home-adv-cont>
            </div>
        </div>
    </div>

</template>

<script>

import HomeHello from "./HomeHello";
import HomeAdvCont from "./HomeAdvCont";

export default {
    name: "HomeRoot",

    // data() {
    //     return {
    //         sort: 1
    //     }
    // },

    components: {
        HomeHello,
        HomeAdvCont
    }
}
</script>

<style>

</style>
