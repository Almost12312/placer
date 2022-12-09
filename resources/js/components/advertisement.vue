<template>
    <div class="advertisement" :data-id="advInfo.id">
        <div class="img__open">
            <div class="openAdv"></div>

            <img v-if="advInfo.images" class="adv_img" :src="advInfo.images" alt="">
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
                    <span v-if="advInfo.price > 0" class="num__price">{{advInfo.price}}</span>
                    <span v-else class="no__price">Цена отсутствует</span>
                </h6>
            </div>
        </div>
        <div v-if="advInfo.status !== 3 && isHome === false" class="setting__container">
            <img src="/images/threeDots.svg" alt="dots">
            <div v-if="advInfo.status === 1" class="settingBtns">
                <a class="compBtn" @click="complete">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 17.837 17.837" xml:space="preserve">
                        <g>
                            <path d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27
                                c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0
                                L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"/>
                        </g>
                    </svg>
                    <div class="afterSettng">
                        Завершить
                    </div>
                </a>
                <a class="redBtn">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 495.339 495.339" style="enable-background:new 0 0 495.339 495.339;" xml:space="preserve">
                                        <path d="M196.299,405.261l277.148-277.124c6.738-6.742,6.738-17.668,0-24.408L374.805,5.056C371.563,1.824,367.176,0,362.598,0
                                            c-4.584,0-8.951,1.824-12.193,5.056L73.256,282.211c-1.871,1.863-3.271,4.121-4.129,6.62L17.76,438.832
                                            c-2.129,6.233-0.498,13.136,4.145,17.789c3.258,3.273,7.649,5.023,12.129,5.04c0.549,1.041,1.369,2.016,2.58,2.856
                                            c8.873,6.191,18.16,10.989,27.627,15.192c44.113,19.555,93.689,18.91,141.607,8.209c36.273-8.121,70.656-22.531,106.008-33.773
                                            c48.125-15.313,100.545-22.667,150.541-28.538c11.065-1.306,9.227-18.468-1.84-17.169c-68.012,8-134.779,21.635-199.277,44.717
                                            c-54.258,19.394-116.512,34.867-172.09,18.005c-11.867-3.588-23.416-8.716-34.514-15.538l135.025-46.232
                                            C192.17,408.527,194.461,407.123,196.299,405.261z M187.508,365.255l-18.32-18.307L418.559,97.656l18.262,18.274L187.508,365.255z
                                             M362.598,41.676l18.303,18.304l-249.34,249.35l-18.307-18.314L362.598,41.676z M91.723,406.445l-19.66-19.652l22.498-65.674
                                            l62.82,62.836L91.723,406.445z"/>
                                    </svg>
                    <div class="afterSettng">
                        Редактировать
                    </div>
                </a>
                <a class="canBtn">
                    <svg version="1.1" @click="remove()" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M380.54,83.027h-48.432v-6.919C332.108,34.142,297.966,0,256,0s-76.108,34.142-76.108,76.108v6.919h-48.432
                                                    c-57.226,0-103.784,46.557-103.784,103.784v20.757h29.477L84.829,512h342.343l27.676-304.432h29.477v-20.757
                                                    C484.324,129.584,437.767,83.027,380.54,83.027z M221.405,76.108c0-19.075,15.519-34.595,34.595-34.595
                                                    c19.075,0,34.595,15.519,34.595,34.595v6.919h-69.189V76.108z M389.261,470.487H122.739L98.837,207.568h314.325L389.261,470.487z
                                                     M72.746,166.054c8.567-24.162,31.653-41.514,58.714-41.514h48.432h152.216h48.432c27.061,0,50.147,17.351,58.714,41.514H72.746z"
                                                />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="235.243" y="249.081" width="41.514" height="179.892"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="152.216" y="249.081" width="41.513" height="179.892"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="318.27" y="249.081" width="41.514" height="179.892"/>
                                            </g>
                                        </g>
                                    </svg>
                    <div class="afterSettng">
                        Удалить
                    </div>
                </a>
            </div>
            <div v-if="advInfo.status === 2" class="settingBtns">
                <a @click="publish" class="pubBtn">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 268.476 268.476" style="enable-background:new 0 0 268.476 268.476;" xml:space="preserve">
                        <g>
                            <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M254.958,245.159c-0.5-11.909-10.124-21.429-22.015-21.429H35.533
                                c-12.21,0-22.109,10.017-22.109,22.373c0,12.356,9.899,22.373,22.109,22.373h197.41c11.888,0,21.509-9.515,22.014-21.419
                                c0.014-0.323,0.096-0.627,0.096-0.954C255.053,245.78,254.971,245.479,254.958,245.159z M79.261,109.806l32.711-32.756v106.41
                                c0,12.356,10.032,22.373,22.407,22.373c12.375,0,22.406-10.017,22.406-22.373V77.05l32.71,32.756c8.874,8.876,23.26,8.876,32.134,0
                                c8.874-8.876,8.874-23.266,0-32.143L150.76,6.696c-4.047-4.048-9.248-6.155-14.542-6.511C135.601,0.134,135.008,0,134.378,0
                                c-0.628,0-1.218,0.134-1.832,0.184c-5.298,0.354-10.502,2.462-14.551,6.512L47.127,77.663c-8.874,8.877-8.874,23.267,0,32.143
                                C56,118.681,70.388,118.681,79.261,109.806z"/>
                        </g>
                    </svg>
                    <div class="afterSettng">
                        Опубликовать
                    </div>
                </a>
                <a class="redBtn">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 495.339 495.339" style="enable-background:new 0 0 495.339 495.339;" xml:space="preserve">
                        <path d="M196.299,405.261l277.148-277.124c6.738-6.742,6.738-17.668,0-24.408L374.805,5.056C371.563,1.824,367.176,0,362.598,0
                            c-4.584,0-8.951,1.824-12.193,5.056L73.256,282.211c-1.871,1.863-3.271,4.121-4.129,6.62L17.76,438.832
                            c-2.129,6.233-0.498,13.136,4.145,17.789c3.258,3.273,7.649,5.023,12.129,5.04c0.549,1.041,1.369,2.016,2.58,2.856
                            c8.873,6.191,18.16,10.989,27.627,15.192c44.113,19.555,93.689,18.91,141.607,8.209c36.273-8.121,70.656-22.531,106.008-33.773
                            c48.125-15.313,100.545-22.667,150.541-28.538c11.065-1.306,9.227-18.468-1.84-17.169c-68.012,8-134.779,21.635-199.277,44.717
                            c-54.258,19.394-116.512,34.867-172.09,18.005c-11.867-3.588-23.416-8.716-34.514-15.538l135.025-46.232
                            C192.17,408.527,194.461,407.123,196.299,405.261z M187.508,365.255l-18.32-18.307L418.559,97.656l18.262,18.274L187.508,365.255z
                             M362.598,41.676l18.303,18.304l-249.34,249.35l-18.307-18.314L362.598,41.676z M91.723,406.445l-19.66-19.652l22.498-65.674
                            l62.82,62.836L91.723,406.445z"/>
                    </svg>
                    <div class="afterSettng">
                        Редактировать
                    </div>
                </a>
                <a @click="remove" class="canBtn">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M380.54,83.027h-48.432v-6.919C332.108,34.142,297.966,0,256,0s-76.108,34.142-76.108,76.108v6.919h-48.432
                                    c-57.226,0-103.784,46.557-103.784,103.784v20.757h29.477L84.829,512h342.343l27.676-304.432h29.477v-20.757
                                    C484.324,129.584,437.767,83.027,380.54,83.027z M221.405,76.108c0-19.075,15.519-34.595,34.595-34.595
                                    c19.075,0,34.595,15.519,34.595,34.595v6.919h-69.189V76.108z M389.261,470.487H122.739L98.837,207.568h314.325L389.261,470.487z
                                     M72.746,166.054c8.567-24.162,31.653-41.514,58.714-41.514h48.432h152.216h48.432c27.061,0,50.147,17.351,58.714,41.514H72.746z"
                                />
                            </g>
                        </g>
                                                <g>
                            <g>
                                <rect x="235.243" y="249.081" width="41.514" height="179.892"/>
                            </g>
                        </g>
                                                <g>
                            <g>
                                <rect x="152.216" y="249.081" width="41.513" height="179.892"/>
                            </g>
                        </g>
                                                <g>
                            <g>
                                <rect x="318.27" y="249.081" width="41.514" height="179.892"/>
                            </g>
                        </g>
                    </svg>
                    <div class="afterSettng">
                        Удалить
                    </div>
                </a>


            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "advertisement",

    props: {
        advInfo: {
            type: Object,
            default() {
                return {}
            }
        },

        isHome: {
            type: Boolean,
            default() {
                return false;
            }
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
        }
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
        }
    }
}
</script>

<style>

</style>
