<template>
    <div class="advertisement__container" id="js_advert">
        <div class="advertisement" v-for="(adv, id) in allAdvert" :data-id="adv.id">
            <img class="adv_img" :src="adv.images" alt="">
            <div class="advertisement__description">
                <h3 class="ad__title">{{ adv.title }}</h3>
                <h4 class="ad__content">{{ adv.content }}</h4>
                <div class="location_price">
                    <h5 class="ad__location">{{ adv.location }}</h5>
                    <h6 class="ad__price">
                        <span class="num__price">{{ adv.price === 0 ? "Бесплатно" : adv.price}}</span>
                    </h6>
                </div>
            </div>
            <div class="setting__container">
                <img src="/images/threeDots.svg" alt="dots">
                <div class="settingBtns">
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
    </div>
</template>

<script>
export default {
    name: "AdvertisementContainer",

    // data() {
    //   return {
    //       allAdv: []
    //   }
    // },

    props: {
        allAdvert: {
            type: Array,
            default() {
                return []
            }
        },

        allAdvertImgs: {
            type: Array,
            default() {
                return [];
            }
        }
    },
}
</script>

<style>

</style>
