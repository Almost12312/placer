<template>
    <div class="categories">
        <header class="categories__title">Выберите категорию</header>
        <div class="categories__container" @click="target">
            <input v-model="thisAdv.categories" id="cars" type="radio" name="cars" value="cars">
            <label for="cars" class="category__container">
                <img src="/images/car.svg" alt="moto">
                <div>Машины</div>
            </label>
            <p></p>
            <input v-model="thisAdv.categories" id="phones" type="radio" name="phones" value="phones">
            <label for="phones" class="category__container">
                <img src="/images/phone.svg" alt="moto">
                <div>Телефоны</div>
            </label>
            <input v-model="thisAdv.categories" id="moto" type="radio" name="moto" value="bike">
            <label class="category__container" for="moto">
                <img src="/images/bike.svg" alt="moto">
                <div>Мотоциклы</div>
            </label>
            <input class="categories" v-model="thisAdv.categories" id="appliances" type="radio" name="appliances" value="appliances">
            <label for="appliances" class="category__container">
                <img src="/images/appliances.svg" alt="moto">
                <div>Бытовая техника</div>
            </label>

            {{thisAdv.categories}}

        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",

    data() {
        return {
            picked: ''
        }
    },

    methods: {
        target(event) {
            let target = event.target;

            if (target.closest('.category__container'))
            {

            }
        },
    },

    props: {
        thisAdv: {
            type: Object,
            default() {
                return {}
            }
        }
    }

}
</script>

<style>
.categories__container input{
    width: 0;
    height: 0;
    opacity: 0;
}
</style>
