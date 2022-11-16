<template>
    <div>

        <ad-list :items="items"></ad-list>

    </div>
</template>

<script>

import AdList from "./AdList";

import axios from 'axios'

export default {
    name: "AdContainer",
    data() {
        return {
            items: []
        }
    },
    methods: {
        loadItems() {

            /*axios.get('/api/items')
                .then(response => {
                    this.items = response.data.items;
                });*/

            this.items = [
                {
                    id: 1,
                    name: 'test 2',
                    images: [
                        {
                            id: 1,
                            src: "/uploads/0ab74cd2b51eb435f2372f631a176016.jpg"
                        }
                    ]
                },
                {
                    id: 2,
                    name: 'test 2',
                    images: [
                        {
                            id: 1,
                            src: "/uploads/0ab74cd2b51eb435f2372f631a176016.jpg"
                        }
                    ]
                }
            ];

        }
    },
    mounted() {

        this.loadItems();
    },
    components: {
        AdList
    },
}
</script>

<style scoped>

</style>
