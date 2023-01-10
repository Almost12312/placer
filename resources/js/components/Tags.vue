<template>
    <div class="tagsOption">
        <input @keyup.enter="pushTags()" class="tags" v-model="sortTags" name="tags" placeholder="Теги" :disabled="validation">
        <div class="tags__container">
            <div class="tags__list">
                <p @click="delTags(id)" class="tag" v-for="(tag, id) in tags">{{tag}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Tags",

    data() {
        return{
            validation: false,
            sortTags: "",
            tags: this.propTags
        }
    },

    props: {
        propTags: {
            type: Array,
            default() {
                return []
            },
        },

        stop: {
            type: Number,
            default() {
                return 5
            },
        }
    },

    methods: {
        pushTags()
        {
            let input = this.sortTags
            let stop = this.stop
            let maxLetters = 10

            if (input === null || input === '')
            {
                return

            }   else
            {
                if (!(this.tags.length === stop))
                {
                    if (!(input.length >= maxLetters))
                    {
                        this.tags.push(input);
                        this.sortTags = null

                    }   else
                    {
                        alert('Максимальный размер тега 10 символов')
                    }

                }   else
                {
                    alert('Максимальное количество тегов 10')
                    input = null
                    this.validation = true
                }
            }
        },

        delTags(id)
        {
            this.tags.splice(id, 1)
            this.validation = false
        }
    }
}
</script>

<style>

</style>
