<template>
    <div class="profile cabinet__changeProfile">
        <div>
            <span class="adPrew__title">Настройки профиля</span>
        </div>
        <input class="red__input" v-model="changeUser.name" type="text" placeholder="Имя">
        <input class="red__input" v-model="changeUser.middlename" type="text" placeholder="Фамилия">
        <input class="red__input" v-model="changeUser.lastname" type="text" placeholder="Отчество">
        <input class="red__input" v-model="changeUser.city" type="text" placeholder="Город">

        <label class="sendAdd">
            Изменить
            <input type="submit" @click="changeInfo()" hidden>
        </label>
    </div>
</template>

<script>
import {mapState} from "vuex";
import axios from "axios";

export default {
    name: "ProfileSettings",

    data() {
        return {
            changeUser: {
                name: '',
                middlename: '',
                lastname: '',
                city: ''
            }
        }
    },

    methods: {
        changeInfo() {
            let keys = Object.keys(this.changeUser)

            keys.forEach(key => {
                if (this.changeUser[key] === '') {
                    this.changeUser[key] = this.userInfo[key]
                }
            })

            axios.post('/change/user/profile', this.changeUser)
                .then(res => {
                    if (res.data.success) {
                        alert('Успешно')
                    }  else {
                        alert(res.data.error)
                    }
                });
        },

        // setUser() {
        //     let keys = Object.keys(this.changeUser)
        //     console.log(keys)
        //
        //     keys.forEach(key => {
        //         if (this.changeUser[key] === '') {
        //             this.changeUser[key] = this.userInfo[key]
        //         }
        //     })
        // },
    },

    computed: {
        ...mapState({
              userInfo: state => state.userinfo
        }),
    },

    // mounted() {
    //     this.setUser()
    // }
}
</script>

<style>

</style>
