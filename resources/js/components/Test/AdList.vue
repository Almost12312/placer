<template>
    <div>

        <ad-item v-for="item in items"
                 :key="item.id"
                 :item="item"
                 @remove="remove"
        />

    </div>
</template>

<script>

import AdItem from "./AdItem";

export default {
    name: "AdList",
    methods: {
        remove(item) {
            let index = this.items.indexOf(item);
            if (index !== -1) {

                // todo

                this.items.splice(index, 1);
            }
        }
    },
    components: {
        AdItem
    },
    props: ["items"]
}
</script>

<style scoped>

</style>
