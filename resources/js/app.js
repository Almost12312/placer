import axios from 'axios'

import Vue from 'vue'
import VueRouter from 'vue-router'

import Test from './components/Test'
import AddAd from './components/AddAd'
import InputPrevCont from "./components/InputPrevCont";
import Registration from "./components/registration";
import Categories from "./components/Categories";
import AdvertisementContainer from "./components/AdvertisementContainer";
import Router from "./components/router";
import Foo from "./components/Foo";
import Drafts from "./components/Drafts";
import HistoryAdv from "./components/HistoryAdv";
import CabinetRoot from "./components/CabinetRoot";
import RedContainer from "./components/RedContainer";
import Splide from '@splidejs/splide/dist/js/splide.min.js'
import '@splidejs/splide/css';
import HeadLayout from "./components/HeadLayout";
import HomeRoot from "./components/HomeRoot";

if (document.querySelector('.fade'))
{
    new Splide('.fade', {
        type: 'fade',
        arrows: false,
    }).mount()
}

if (document.querySelector('.homeSlider'))
{
    new Splide('.homeSlider', {
        type   : 'loop',
        arrows: false,
        pagination: false,
        perPage: 2,
        autoplay: true
    }).mount()
}

Vue.use(VueRouter)

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/foo',
            component: Foo
        },
        {
            path: '/',
            component: AdvertisementContainer,
            props: true
        },
        {
            path: '/draft',
            component: Drafts,
        },
        {
            path: '/history',
            component: HistoryAdv
        }

    ]
})

if (document.getElementById('vue-app')) {

    new Vue({
        el: '#vue-app',
        components: {
            Test, AddAd
        }
    });
}

if (document.querySelector('.redaction__adv')) {
    new Vue ({
        el: '.redaction__adv',
        components: {
            RedContainer, Categories, InputPrevCont
        }
    })
}

if (document.querySelector('.registrationCont')) {
    new Vue ({
        el: '.registrationCont',
        components: {
            Registration
        }
    })
}

if (document.querySelector('.cabinet__container')) {
    new Vue ({
        el: '.cabinet__container',
        router,
        components: {
            CabinetRoot
        },
    })
}

if (document.querySelector('.header__container')) {
    new Vue ({
        el: '.header__container',
        components: {
            HeadLayout
        }
    })
}

// if (document.querySelector('.posts')) {
//     new Vue ({
//         el: '.posts',
//         components: {
//
//         }
//     })
// }






if (document.querySelector('.infinity__advs'))
{
    new Vue ({
        el: '.infinity__advs',
        components: {
            HomeRoot
        }
    })
    // let cont = document.querySelector('#homeAdvCont');
    //
    // cont.addEventListener('click', event => {
    //     let target = event.target
    //
    //     if (target.closest('.openAdv'))
    //     {
    //         console.log("Привет")
    //         let id = target.closest('.advertisement').dataset.id
    //
    //         location.href = `/advertisement/` + id + `/view`
    //
    //     }   else
    //     {
    //         return
    //     }
    // })
}

if (document.querySelector('.withoutRegPhoto__bg'))
{
    console.log("Вы изменили цвет для бг")
    let clr = Math.random().toString(16).substring(2, 8).match(/.{1,2}/g)
    let rgba = [
        parseInt(clr[0], 16),
        parseInt(clr[1], 16),
        parseInt(clr[2], 16),
    ]

    document.querySelector('.withoutRegPhoto__bg').style.background = "rgba(" + rgba[0] + "," + rgba[1] + ", " + rgba[2] + ", 1)"
}

// Vue.use(VueSplide)
//
// if (document.querySelector('.advert__images'))
// {
//     new Vue ({
//         el: '.advert__images',
//         components: {
//             viewAdvSlider
//         },
//     })
// }

// if (document.querySelector('.view__adv__container'))
// {
//     new Vue ({
//         el: '.view__adv__container',
//         components: {
//             Profile,
//             // AdvViewRoot //delete
//         }
//     })
// }


let loginBtn = document.getElementById('auth__submit');
if (loginBtn) {
    loginBtn.addEventListener('click', ()=> {
        let login = document.getElementById("login").value;
        let password = document.getElementById("password").value;
        let credentials = {
            login: login,
            password: password
        }

        axios.post('/login', credentials)
             .then((response) => {
                 console.log(response)

                if (response.data.success === true) {

                    location.href = response.data.redirect;
                }
                else {

                    alert('Неверный логин и/или пароль');
                }

             });
    })
}

if (document.querySelector('#goAdd'))
{
    let goAdd = document.querySelector('#goAdd')

    goAdd.addEventListener('click', function () {
        location.href = '/advertisement/create'
    })
}

if (document.querySelector('#logout'))
{
    let logout = document.querySelector('#logout')
    logout.addEventListener('click', function () {
        axios.post('/logout')
             .then(response => {
                location.href = response.data.redirect
             })
    })


}



// let addProduct = document.getElementById("add__product");
// let products = document.getElementById("products");
// let advert = document.getElementById("js_advert");
// let form = document.getElementById('form')
//
// let tabElementsTitle = document.getElementById("tab1");
// let tabElementsTitle2 = document.getElementById("tab2");
//
//
// addProduct.addEventListener('click', function() {
//     tabElementsTitle.style.display = "none";
//     advert.style.display = "none";
//
//     tabElementsTitle2.style.display = "block";
//     tabElementsTitle2.style.display = "flex";
//     form.style.display = "flex";
//
//     addProduct.classList.toggle("a_active")
//     products.classList.remove("a_active")
// })
//
// products.addEventListener('click', function() {
//     tabElementsTitle.style.display = "flex";
//     advert.style.display = "flex";
//
//     tabElementsTitle2.style.display = "none";
//     tabElementsTitle2.style.display = "none";
//     form.style.display = "none";
//
//     products.classList.toggle("a_active")
//     addProduct.classList.remove("a_active")
// })

/* Модальное окно. Функционал */

// let imageIds = [];
//
// let modalBtn = document.querySelector('.modalBackdrop').querySelector('#image')
//
// modalBtn.addEventListener('change', event => {
//     upload()
// })
//
//
//
// function upload() {
//     const files = event.target.files;
//
//     if (files.length === 0) {
//         return;
//     }
//
//     // let file = files[0];
//
//     for (let i = 0; i < files.length; i++)
//     {
//         let fd = new FormData;
//         fd.append('file', files[i]);
//
//         axios.post('/file/upload', fd)
//             .then((response) => {
//                 imageIds.push(response.data)
//
//                 if (modalBtn) {
//
//                     let prevCont = document.createElement('div')
//                     prevCont.className = "preview__container"
//                     document.querySelector('.images__preview').prepend(prevCont)
//
//                     let newImg = document.createElement('img')
//                     newImg.className = "img__red preview";
//                     newImg.dataset.id = response.data.id;
//                     newImg.src = response.data.url;
//                     document.querySelector('.preview__container').prepend(newImg)
//
//                     let cancelXCont = document.createElement('div')
//                     cancelXCont.className = "cancelX__container"
//                     document.querySelector('.preview__container').append(cancelXCont)
//
//                     let cancelX = document.createElement('div')
//                     cancelX.className = "cancelX"
//                     document.querySelector('.cancelX__container').prepend(cancelX)
//
//                     newImg.style.display = "block"
//
//                 }
//             })
//     }
// }
//
// function rmImg (id) {
//     let image = document.querySelector(`.preview__container img[data-id="${id}"]`);
//
//     if (image)
//     {
//         document.querySelector('.preview__container').remove()
//
//         let index = imageIds.findIndex(item => item.id === id);
//
//         if (index !== -1) {
//             imageIds.splice(index, 1);
//         }
//     }
// }
//
// let imgsPrevCont = document.querySelector('.images__preview')
//
// imgsPrevCont.addEventListener('click', event => {
//     let target = event.target
//
//     if (target.closest('.cancelX__container')){
//         let canselXIds = target.closest('.images__preview').querySelector('.preview').dataset.id
//
//         rmImg(canselXIds)
//
//     } else {
//         return
//     }
// })
//
// // let addRedBtn = document.querySelector('#addRedaction')
// //
// // addRedBtn.addEventListener('click', function (){
// //
// // })
//
// let cancelBtn = document.querySelector('.cancel__btn')
//
// cancelBtn.addEventListener('click', function() {
//     let allRedImgs = document.querySelectorAll('.preview')
//
//     for (let i = 0; i < allRedImgs.length; ++i)
//     {
//         rmImg(allRedImgs[i].dataset.id)
//     }
//
//     modalBD.style.display = "none";
//
// })
//
//
//
//
// /* Создание объявления */
//
// let uplImgAdv = document.getElementById('imageAddAdvert')
//
// uplImgAdv.addEventListener('change', function (){
//     upload()
// })
//
// let ids = []
//
// let addAdvert = document.querySelector('#addRedaction')
// addAdvert.addEventListener('click', function ()
// {
//     let findInx = document.querySelectorAll(`.preview__container img[data-id="${id}"]`);
//
//     for (let i = 0; i < findInx.length, i++) {
//         if (findInx)
//         {
//             let index = imageIds.findIndex(item => item.id === id);
//
//             if (index !== -1) {
//                 imageIds.splice(index, 1);
//             }
//         }
//     }
//
//
//     let title = document.getElementById('title').value;
//     let content = document.getElementById('content').value;
//     let location = document.getElementById('location').value;
//     let price = document.getElementById('price').value;
//
//     // console.log(imageIds.length)
//
//     let addAdvertPost = {
//         title: title,
//         content: content,
//         location: location,
//         price: price,
//         images_ids: ids
//     }
//
//     axios.post('/advertisement/create', addAdvertPost)
//         .then((response) =>{
//
//
//
//             if (response.data.success) {
//                 alert('Объявление успешно загружено');
//                 console.log(ids)
//             } else {
//                 alert("Наебни говна олух");
//             }
//         });
// })
//
// /* Сбор инфы из таргет объявления */
//
console.log("sd")
// if (document.querySelector('#createAdd'))
// {
//     let createAdd = document.querySelector('#createAdd')
//     createAdd.addEventListener('click', function (){
//         let id = null
//
//         location.href = `/advertisement/create`
//     })
// }
//
// if (document.querySelector('#js_advert'))
// {
//     let jsAdv = document.querySelector('#js_advert')
//
//     jsAdv.addEventListener('click', event => {
//         let target = event.target;
//
//         if (target.closest('.redBtn')) {
//
//             // let title = target.closest('.advertisement').querySelector('.ad__title').textContent
//             // let content = target.closest('.advertisement').querySelector('.ad__content').textContent
//             // let location = target.closest('.advertisement').querySelector('.ad__location').textContent
//             // let price = target.closest('.advertisement').querySelector('.ad__price').textContent
//             let id = target.closest('.redBtn').closest('.advertisement').dataset.id
//
//             console.log(id)
//
//             let idAdv = {
//                 idAd: id
//             }
//             // let dataIdImg = target.closest('.advertisement').querySelectorAll('.adv_img');
//             console.log(idAdv)
//
//             location.href = `/advertisement/` + id + `/redaction`
//         } else {
//             return
//         }
// }
        // axios.post('/advertisement/view', idAdv)
            // .then(location.href = '/advertisement/create')


        // if (target.closest('.redaction'))
        //     {
        //         let titleRed = document.querySelector('.title__red').value = title;
        //         let contentRed = document.querySelector('.content__red').value = content;
        //         let locationRed = document.querySelector('.location__red').value = location;
        //         let priceRed = document.querySelector('.price__red').value = toInteger(price);
        //         let imageRed = document.querySelector('.img__red').src = image;
        //
        //
        //         modalBD.style.display = "block";
        //     }
        //
        //     if (target.closest('.delete'))
        //     {
        //         console.log('ce')
        //
        //         console.log(dataId)
        //
        //         let delPost = {
        //             id: dataId
        //         }
        //
        //         axios.post('/advertisement/delete', delPost)
        //             .then((response) => {
        //                 console.log(response.data.del)
        //
        //                 let delAdv = target.closest('.advertisement').style.display = "none"
        //             })
        //     }
//     if (modalBD){
//         // modal.addEventListener('click', function (){
//         //
//         //     let target = event.target
//         //
//         //     if (target.closest('.addRedaction'))
//
//         let addRedBtn = document.querySelector('#addRedaction')
//         addRedBtn.addEventListener('click', function ()
//         {
//             let title = document.querySelector('.title__red').value
//             let content = document.querySelector('.content__red').value
//             let location = document.querySelector('.location__red').value
//             let price = toInteger(document.querySelector('.price__red').value)
//             let imgs = document.querySelector('.preview').src
//
//             let addRed = {
//                 title: title,
//                 content: content,
//                 location: location,
//                 price: price,
//                 imgs: imgs,
//                 id: dataId
//             }
//
//             axios.post('/advertisement/redaction', addRed)
//         })
//
//
//     }
//
//
//     })
// }


// let redBtn = document.querySelectorAll('.redaction')

// for (let i = 0; i < redBtn.length; i++)  {
//     redBtn[i].addEventListener('click', function (){
//         let modalBD = document.querySelector('.modalBackdrop')
//
//         let title = document.querySelectorAll('.ad__title')[i].textContent;
//         let content = document.querySelectorAll('.ad__content')[i].textContent;
//         let location = document.querySelectorAll('.ad__location')[i].textContent;
//         let price = document.querySelectorAll('.ad__price')[i].textContent;
//         let image = document.querySelectorAll('.adv_img')[i].src;
//
//         console.log(title)
//
//         let titleRed = document.querySelector('.title__red').value = title;
//         let contentRed = document.querySelector('.content__red').value = content;
//         let locationRed = document.querySelector('.location__red').value = location;
//         let priceRed = document.querySelector('.price__red').value = toInteger(price);
//         let imageRed = document.querySelector('.img__red').src = image;
//
//         modalBD.style.display = "block";
//     })
// }




// let cancelBtn = document.querySelector('.cancel__btn')
// cancelBtn.addEventListener('click', function (){
//     let modalBD = document.querySelector('.modalBackdrop')
//
//     modalBD.style.display = "none";
//     modalBD.style.transition = 0.3;
//
//     // imgsPrev.length = 0
//
//     if (document.querySelectorAll('#img__preview')) {
//         let delImgs = document.querySelectorAll('#img__preview')
//
//         for (let c = 0; c<delImgs.length; c++)
//         {
//             delImgs[c].remove(delImgs[c])
//         }
//
//         for (let delCount = 0; delCount < imgsPrevId.length; delCount++)
//         {
//             imageIds.pop()
//         }
//
//         console.log(imageIds)
//     }
// })


// document.querySelector('.upload__img')
//     .addEventListener('change', function (files){
//
//         let newImg = document.createElement('img')
//         // let src = document.querySelector(".images__preview").src = url
//
//         newImg.setAttribute("id", "img__preview")
//         newImg.className = "img__red"
//         // newImg.src = URL.createObjectURL(newImg)
//
//         document.querySelector('.images__preview').prepend(newImg)
//
//         document.querySelector('.images__preview').src = URL.createObjectURL(this.files[0])
//         // let img = document.querySelectorAll('#img__preview').src = url;
//
//         // for (let i = 0; files.length; i++) {
//         //     document.querySelectorAll('#img__preview')[i].style.display = "block";
//         //
//         //     let imgContainer = document.querySelector('.images__preview')
//         //
//         //     let newImg = document.createElement('img')
//         //     newImg.tagName = "img__preview"
//         //
//         //     newImg.append(imgContainer)
//         // }
//     })




// let logoutBtn = document.getElementById('logout_btn');
// if (logoutBtn) {
//     logoutBtn.addEventListener('click', (event) => {
//
//         event.preventDefault();
//
//         axios.post('/logout').then(() => {
//             location.reload();
//         });
//     })
// }
//
// let registerBtn = document.getElementById('register_btn');
// if (registerBtn) {
//     registerBtn.addEventListener('click', ()=> {
//         let login = document.getElementById("login").value;
//         let password = document.getElementById("password").value;
//         let age = document.getElementById("age").value;
//         let name = document.getElementById("name").value;
//         let credentials = {
//             login: login,
//             password: password,
//             age: age,
//             name: name
//         }
//
//         axios.post('/register', credentials)
//             .then((response) => {
//
//                 if (response.data.success) {
//
//                     location.href = response.data.redirect;
//                 }
//                 else {
//
//                     alert('Неверный логин и/или пароль');
//                 }
//
//             });
//
//         console.log(credentials.login)
//     })
// }
