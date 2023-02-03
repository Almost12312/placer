<template>
    <article class="cabinet">
        <aside class="cabinet__menu">

            <profile
                :userinfo="userinfo"
            ></profile>

            <div class="advertisement__status__container" @click="target">
                <router-link
                    v-for="link in linksList"
                    :key="link.id"

                    :to="link.href"
                    class="adv__status">
                    <div
                        class="adv__status__noActive"
                        :class="{ adv__status__active: activeClass === link.id }"
                    >
                        <p class="status__after">{{ link.content }}</p>
                    </div>
                </router-link>
<!--                <router-link to="/" class="adv__status">-->
<!--                    <div-->
<!--                        class="adv__status__noActive"-->
<!--                        :class="{ adv__status__active: activeClass === 1 }"-->
<!--                    >-->
<!--                        <p class="status__after">Активные объявления ({{userinfo.advPublish ? userinfo.advPublish : 0}})</p>-->
<!--                    </div>-->
<!--                </router-link>-->
<!--                <router-link to="/draft" class="adv__status">-->
<!--                    <div-->
<!--                        class="adv__status__noActive"-->
<!--                        :class="{ adv__status__active: activeClass === 2 }"-->
<!--                    >-->
<!--                        <p class="status__after">Черновики ({{userinfo.advDrafts ? userinfo.advDrafts : 0}})</p>-->
<!--                    </div>-->
<!--                </router-link>-->
<!--                <router-link to="/history" class="adv__status">-->
<!--                    <div-->
<!--                        class="adv__status__noActive"-->
<!--                        :class="{ adv__status__active: activeClass === 3 }"-->
<!--                    >-->
<!--                        <p class="status__after">История объявлений</p>-->
<!--                    </div>-->
<!--                </router-link>-->
                <a class="adv__status" @click="createAdv">
                    <div class="adv__status__active">
                        <p>Добавить объявление</p>
                    </div>
                </a>
            </div>
        </aside>
    </article>
</template>

<script>

const links = [
    {
        id: 1,
        content: "Активные объявления",
        href: "/",
    },
    {
        id: 2,
        content: "Черновики",
        href: "/draft",
    },
    {
        id: 3,
        content: "История объявлений",
        href: "/history",
    },
    {
        id: 4,
        content: "Настройки профиля",
        href: "/edit-user",
    }
]

import Profile from "./Profile";

export default {
    name: "ProfileContainer",

    data() {
        return {
            activeClass: null,

            linksList: links,
        }
    },

    props: {
        userinfo: {
            type: Object,
            default() {
                return {}
            }
        }
    },

    methods: {

        createAdv() {
            location.href = '/advertisement/create'
        },

        target(event)
        {
            let target = event.target

            if (target.closest('.adv__status__noActive'))
            {
                let allNoActive = document.querySelectorAll('.adv__status__noActive')
                for (let i = 0; i < allNoActive.length; i++)
                {
                    allNoActive[i].classList.remove('adv__status__active')
                    target.closest('.adv__status__noActive').classList.add('adv__status__active')
                }
            }
        },

        activeClases() {
            let routePath = this.$route.path

            switch (routePath) {
                case '/':
                    return this.activeClass = 1
                case '/draft':
                    return this.activeClass = 2
                case '/history':
                    return this.activeClass = 3

            }
        },
    },

    components: {
        Profile
    },

    mounted() {
        this.activeClases()
    }
}
</script>

<style>

</style>
