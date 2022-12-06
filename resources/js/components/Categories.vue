<template>
    <div class="categories">
        <header class="categories__title">Выберите категорию</header>
        <div class="categories__container" @click="target">
            <input v-model="thisAdv.category" id="cars" type="radio" name="cars" value="1">
            <label for="cars" class="category__container"
            >
                <img src="/images/car.svg" alt="moto">
                <div>Машины</div>
            </label>
            <p></p>
            <input v-model="thisAdv.category" id="phones" type="radio" name="phones" value="2">
            <label for="phones" class="category__container "
            >
                <img src="/images/phone.svg" alt="moto">
                <div>Телефоны</div>
            </label>
            <input v-model="thisAdv.category" id="moto" type="radio" name="moto" value="3">
            <label class="category__container" for="moto"

            >
                <img src="/images/bike.svg" alt="moto">
                <div>Мотоциклы</div>
            </label>
            <input class="categories" v-model="thisAdv.category" id="appliances" type="radio" name="appliances" value="4">
            <label for="appliances" class="category__container"
            >
                <img src="/images/appliances.svg" alt="moto">
                <div>Бытовая техника</div>
            </label>

        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",

    data() {
        return {
            // active: this.thisAdv.category
        }
    },

    methods: {
        // target(event) {
        //     let target = event.target;
        //
        //     if (target.closest('.category__container'))
        //     {
        //         console.log(this.thisAdv.category)
        //         // this.active = this.thisAdv.category
        //         // console.log(typeof this.active)
        //         // console.log(this.active)
        //     }
        // },
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
