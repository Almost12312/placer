<template>
    <div class="inputs_container">
        <input type="text" v-model="inputs_info_data.title" class="red__input title__red" id="title__red" placeholder="Заголовок">
        <textarea type="text" v-model="inputs_info_data.content" class="red__input content__red" id="content__red" placeholder="Описание"></textarea>
        <input type="text" v-model="inputs_info_data.location" class="red__input location__red" id="location__red" placeholder="Расположение">
        <input type="number" v-model="inputs_info_data.price" class="red__input price__red" id="price__red" placeholder="Цена">
        <input @keyup.enter="pushTags()" class="tags" v-model="inputs_info_data.tags" name="tags" placeholder="Теги" :disabled="validation">
        <div class="tags__container">
            <p @click="delTags(id)" class="tag" v-for="(tag, id) in tags">{{tag}}</p>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "InputsAdvert",

    data() {
        return {
            validation: false,
            tags: this.thisAdv.tags
        }
    },

    props: {
        inputs_info_data: {
            type: Object
        },

        thisAdv: {
            type: Object
        },
    },

    methods: {
        pushTags()
        {
            if (this.inputs_info_data.tags === null || this.inputs_info_data.tags === '')
            {
                return

            }   else
            {
                if (!(this.tags.length === 10))
                {
                    this.tags.push(this.inputs_info_data.tags)
                    this.inputs_info_data.tags = null

                }   else
                {
                    alert('Максимальное количество тегов 10')
                    this.inputs_info_data.tags = null
                    this.validation = true
                }
            }
        },

        delTags(id)
        {
            this.thisAdv.tags.splice(id, 1)
        }
    },

    watch: {
        tags ()
        {
            console.log(this.tags.length)
        }
    }

    // components: {
    //     Preview
    // }
}

</script>

<style>

</style>
