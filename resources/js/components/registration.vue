<template>
    <section class="containerAuth">
        <div class="from__container">
            <div class="social">
                <span class="regPhotoTitle">Загрузить фотографию</span>
                <div class="avatar">
                    <input id="regUpl" type="file" @change="uplAvatar" hidden>
                    <label for="regUpl" class="uplAvatarLabel">
                        <svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="16" height="16" id="icon-bound" fill="none" />
                            <path d="M3.294,7.706l1.416,1.416L7,6.828V16h2V6.828l2.294,2.294l1.416-1.416L8,3L3.294,7.706z M0,2h16V0H0V2z" />
                        </svg>
                    </label>

<!--                    <img v-if="regInfo.imgUrl === undefined || regInfo.imgUrl.length === 0" src="/images/avatar.png" alt="avatar">-->
<!--                    <p v-for="image in regInfo.img">{{image.url}}</p>-->
                    <img v-if="regInfo.url" :src="regInfo.url" alt="аватарка">
                    <div v-else class="withoutRegPhoto__bg">
                        <div v-if="regInfo.name" class="withoutRegPhoto">{{ regInfo.name.substring(0, 1) }}</div>
                    </div>
                </div>
            </div>
            <div class="auth__window reg__window">
                <h3>Регистрация</h3>
                <input v-model="regInfo.name" type="text" placeholder="Имя">
                <input v-model="regInfo.lastname" type="text" placeholder="Фамилия">
                <input v-model="regInfo.middlename" type="text" placeholder="Отчество">
                <input v-model="regInfo.age" type="text" placeholder="Возвраст">
                <input v-model="regInfo.email" type="text" placeholder="Email">
                <input v-model="regInfo.password" type="password" placeholder="Пароль">
                <input v-model="regInfo.phone" type="text" placeholder="Телефон">
                <input v-model="regInfo.city" type="text" placeholder="Город">

                <div class="button__container">
                    <button class="submit" @click="reg" id="register__submit">Зарегестрироваться</button>
                    <a href="/authorization" class="submit">Войти</a>
                </div>
            </div>
        </div>
    </section>

</template>

<script>

import axios from "axios";

export default {
    name: "registration",

    data() {
        return {
            regInfo: {
                url: null
            }
        }
    },

    methods: {
        reg() {
            axios.post('reg-or-update', this.regInfo)
                 .then(response => {

                    if (response.data.success === true){
                        location.href = response.data.redirect
                    } else {
                        alert('Вы ввели невалидные данные')
                    }
                })
        },

        uplAvatar() {
            let input = document.querySelector('#regUpl');

            let fd = new FormData
            fd.append('file', input.files[0])
            console.log(fd)

            axios.post('/file/upload', fd)
                .then(response => {
                    console.log(response)
                    this.regInfo.url = response.data.url
                    this.regInfo.id = response.data.id
                })
        },

        randomBg() {
            // console.log('xer')
            console.log('#'+Math.random().toString(16).substr(2,6))
            document.querySelector('.withoutRegPhoto__bg').style.backgroundColor = '#'+Math.random().toString(16).substr(2,6)
        },


    },

    mounted() {
        this.randomBg()
    }
}
</script>

<style>

</style>
