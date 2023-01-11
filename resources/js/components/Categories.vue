<template>
    <div class="categories">
        <header class="categories__title">Выберите категорию</header>
        <div class="categories__container">

            <label v-for="category in categoryList" class="category__container" :class="classes(category.id)">
                <img :src="category.image" alt="">
                <span>{{ category.name }}</span>
                <input @click="emmiting(category.id)" v-model.number="categoryIdSelected" type="radio" name="category" :value="category.id">
            </label>

        </div>
    </div>
</template>

<script>

const categories = [
    {
        id: 1,
        name: "Машины",
        image: "/images/car.svg"
    },
    {
        id: 2,
        name: "Телефоны",
        image: "/images/phone.svg"
    },
    {
        id: 3,
        name: "Мотоциклы",
        image: "/images/bike.svg"
    },
    {
        id: 4,
        name: "Бытовая техника",
        image: "/images/appliances.svg"
    },

];

export default {
    name: "Categories",

    model: {
        props: {
            value: {
                type: Number,
            }
        },

        event: 'input'
    },

    data() {
        return {
            categoryList: categories,

            categoryIdSelected: this.value
        }
    },

    watch: {

        categorySelected(nVal) {
            console.log(nVal)

            this.$emit('change', nVal);
        }
    },

    methods: {

        emmiting(id) {
            this.$emit('input', id)
        },

        classes(catId) {
            return [{category__active: this.categoryIdSelected === catId}];
        }
    },

    // mounted() {
    //     this.classes()
    // },



}
</script>

<style>
.categories__container input{
    width: 0;
    height: 0;
    opacity: 0;
}
</style>
