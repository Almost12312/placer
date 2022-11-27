<template>
    <div class="categories">
        <header class="categories__title">Выберите категорию</header>
        <div class="categories__container" @click="target">
            <input v-model="thisAdv.cars"  type="radio" name="cars" value="cars" hidden>
            <label for="cars" class="category__container">
                <img src="/images/car.svg" alt="moto">
                <div>Машины</div>
            </label>
            <input v-model="thisAdv.phones"  type="radio" name="phones" value="phones" hidden>
            <label class="category__container">
                <img src="/images/phone.svg" alt="moto">
                <div>Телефоны</div>
            </label>
            <input v-model="thisAdv.bike"  type="radio" name="moto" value="bile" hidden>
            <label class="category__container">
                <img src="/images/bike.svg" alt="moto">
                <div>Мотоциклы</div>
            </label>
            <input v-model="thisAdv.appliances" type="radio" name="appliances" value="appliances" hidden>
            <label class="category__container">
                <img src="/images/appliances.svg" alt="moto">
                <div>Бытовая техника</div>
            </label>
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",

    methods: {
        target(event) {
            let target = event.target;

            if (target.closest('.category__container'))
            {
                console.log(target.closest('.category__container input'))
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

</style>
