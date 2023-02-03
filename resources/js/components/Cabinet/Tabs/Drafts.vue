<template>
    <AdvertisementContainer
        page="drafts"
    ></AdvertisementContainer>
</template>

<script>
import AdvertisementContainer from "../../AdvertisementContainer.vue";


export default {
    name: "Drafts",

    // methods: {
    //     loadAdv()
    //     {
    //         let advStatus = {
    //             status: 2
    //         }
    //
    //         axios.post('/load-adv', advStatus)
    //             .then((response) =>
    //             {
    //                 this.allAdv = response.data.data
    //             })
    //     },
    //
    //     target(event)
    //     {
    //         let target = event.target;
    //
    //         if (target.closest('.redBtn'))
    //         {
    //             let id = target.closest('.advertisement').dataset.id
    //
    //             let idAdv = {
    //                 idAd: id
    //             }
    //
    //             console.log(idAdv)
    //
    //             location.href = `/advertisement/` + id + `/redaction`
    //
    //         } else
    //         {
    //             return
    //         }
    //     },
    //
    //     remove(advInfo)
    //     {
    //         let index = this.allAdv.indexOf(advInfo)
    //
    //         this.allAdv.splice(index, 1)
    //
    //         let delAdvert = {
    //             id: advInfo.id
    //         }
    //
    //         this.$store.commit('delDraft')
    //
    //         axios.post('/advertisement/delete', delAdvert)
    //     },
    //
    //     publish(advInfo)
    //     {
    //
    //         if (advInfo.title === null || advInfo.content === null ||
    //             advInfo.location === null || parseInt(advInfo.price) === null ||
    //             advInfo.images === null || advInfo.category === null)
    //         {
    //             alert('Объявление не заполнено')
    //
    //         }   else
    //         {
    //
    //             let info = {
    //                 id: advInfo.id,
    //                 status: advInfo.status
    //             }
    //
    //             axios.post('/advertisement/change-status', info)
    //                 .then((response) =>
    //                 {
    //                     if (response.data.success)
    //                     {
    //                         let index = this.allAdv.indexOf(advInfo)
    //                         this.allAdv.splice(index, 1)
    //
    //                         alert('Опубликовано')
    //
    //                     } else
    //                     {
    //                         alert("Что-то пошло не так")
    //                     }
    //                 })
    //         }
    //     }
    //
    //     // remove(advInfo) {
    //     //     console.log(advInfo)
    //     //     let index = this.allAdv.indexOf(advInfo)
    //     //
    //     //     this.allAdv.splice(index, 1)
    //     //
    //     //     console.log(index)
    //     //
    //     //     let delAdvert = {
    //     //         id: advInfo.id
    //     //     }
    //     //
    //     //     axios.post('/advertisement/delete', delAdvert)
    //     // }
    //
    // },

    components: {
        AdvertisementContainer
    }
}
</script>

<style>

</style>
