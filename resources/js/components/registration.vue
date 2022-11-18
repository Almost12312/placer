<template>
    <section class="containerAuth">
        <div class="from__container">
            <div class="social">
                <h4>Совсем немного и</h4>
                <h3>откроется новый мир</h3>
                <div class="auth__slider">SLIDER</div>
            </div>
            <div class="auth__window reg__window">
                <h3>Регистрация</h3>
                <input v-model="regInfo.name" type="text" placeholder="ФИО">
                <input v-model="regInfo.age" type="text" placeholder="Возвраст">
                <input v-model="regInfo.email" type="text" placeholder="Email">
                <input v-model="regInfo.password" type="password" placeholder="Пароль">
                <input v-model="regInfo.phone" type="text" placeholder="Телефон">

                <button class="submit" @click="reg" id="register__submit">Войти</button>
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
        }
    }
}
</script>

<style>

</style>
