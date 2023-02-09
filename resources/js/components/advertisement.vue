<template>
        <div class="advertisement" :data-id="advInfo.id">
            <div class="img__open">
                <div class="openAdv"></div>

                <img v-if="advInfo.images" class="adv_img" :src="advInfo.images.src" alt="">
                <div v-else class="noPhotoCont">
                    <img class="noPhoto" src="/images/noPhoto.svg" alt="">
                </div>

                <div class="tags__list">
                    <p v-for="tag in twoTags" v-bind:key="tag.id" class="tag">{{ tag.name }}</p>
                </div>
            </div>
            <div class="advertisement__description">
                <h3 v-if="advInfo.title" class="ad__title">{{ advInfo.title }}</h3>
                <h3 v-else class="ad__title">Не указано</h3>

                <h4 v-if="advInfo.content" class="ad__content">{{ advInfo.content }}</h4>
                <h4 v-else class="ad__content">Не указано</h4>

                <div class="location_price">
                    <h5 v-if="advInfo.location" class="ad__location">{{ advInfo.location }}</h5>
                    <h5 v-else class="ad__location">Город не указан</h5>

                    <h6 class="ad__price">
                        <span v-if="advInfo.price === 0" class="no__price">Бесплатно</span>
                        <span v-if="advInfo.price > 0" class="num__price">{{calcPrice()}}</span>
                    </h6>
                </div>
            </div>
            <div
                v-if="userId !== 0"
                @click="favorites"
                class="favorites__container"
                :class="{favorites__container__active: favorite}"
            >
                <svg version="1.1" id="favorite" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 485.3 485.3" xml:space="preserve">
                    <g>
                        <path d="M446.9,181.3c0.1-26.1-10.1-50.6-28.5-69c-18.4-18.4-42.9-28.6-68.9-28.6c-26,0-50.6,10.2-69,28.6l-21.9,21.9
                            c-6.2,6.1-17.2,6.1-23.3,0l-22-22c-18.5-18.5-43-28.7-69.1-28.7c-25.9,0-50.4,10.2-68.8,28.5c-18.4,18.4-28.5,42.9-28.5,68.9
                            c0.1,26.1,10.3,50.6,28.7,69l171.5,171.5l171.1-171.2C436.8,231.8,446.9,207.3,446.9,181.3z"/>
                    </g>
                </svg>
            </div>
        </div>
</template>

<script>

import axios from "axios";

export default {
    name: "advertisement",

    props: {
        advInfo: {
            type: Object,
            default() {
                return {}
            }
        },

        favorite: {
            type: Boolean,
            default() {
                return false
            }
        },

        userId: {
            type: Number,
            default() {
                return 0
            },
        }
    },

    methods: {
        remove() {
            this.$emit('remove', this.advInfo)
        },

        publish() {
            this.$emit('publish', this.advInfo)
        },

        complete() {
            this.$emit('complete', this.advInfo)
        },

        favorites() {
            let adv = {
                id: this.advInfo.id
            }

            axios.post('/advertisement/add-favorite', adv)
                 .then(response => {
                     if (response.data.success) {
                         this.favorite = !this.favorite
                     }
                 })
        },

        calcPrice() {
            let toCalc = `${this.advInfo.price}`.split('').reverse()
            let count = 0

            while (count < toCalc.length) {
                if (count % 3 === 0 && count !== 0) {
                    toCalc[count-1] = ' ' + toCalc[count-1]
                }

                count++;
            }

            return toCalc.reverse().join('').trim()
        },
    },

    computed: {
        twoTags() {
            if (this.advInfo.tags.length >= 3)
            {
                return [this.advInfo.tags[0], this.advInfo.tags[1]]

            }   else
            {
                return this.advInfo.tags
            }
        },
    },

    mounted() {
        // this.sizes()
    }
}
</script>

<style lang="css">
    .advert-enter-active, .advert-leave-active {
        transition: opacity .5s;
    }
</style>
