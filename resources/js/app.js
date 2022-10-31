import axios from 'axios'
import {toInteger} from "lodash";



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

                if (response.data.success) {

                    location.href = response.data.redirect;
                }
                else {

                    alert('Неверный логин и/или пароль');
                }

            });

        console.log(credentials.login)
    })
}

let addProduct = document.getElementById("add__product");
let products = document.getElementById("products");
let advert = document.getElementById("js_advert");
let form = document.getElementById('form')

let tabElementsTitle = document.getElementById("tab1");
let tabElementsTitle2 = document.getElementById("tab2");


addProduct.addEventListener('click', function() {
    tabElementsTitle.style.display = "none";
    advert.style.display = "none";

    tabElementsTitle2.style.display = "block";
    tabElementsTitle2.style.display = "flex";
    form.style.display = "flex";

    addProduct.classList.toggle("a_active")
    products.classList.remove("a_active")
})

products.addEventListener('click', function() {
    tabElementsTitle.style.display = "flex";
    advert.style.display = "flex";

    tabElementsTitle2.style.display = "none";
    tabElementsTitle2.style.display = "none";
    form.style.display = "none";

    products.classList.toggle("a_active")
    addProduct.classList.remove("a_active")
})

let imageIds = [];

// let imgsPrev = [];
// let imgsPrevId = [];

let addRed = document.querySelectorAll('#image')

for(let b=0; b<addRed.length; b++) {
    addRed[b].addEventListener('change', event => {

        const files = event.target.files;

        if (files.length === 0) {
            return;
        }

        let file = files[0];

        let fd = new FormData;
        fd.append('file', file);

        axios.post('/file/upload', fd)
            .then((response) => {
                imageIds.push(response.data)
                console.log(response.data.url)
                console.log(imageIds)

                if (document.querySelector('.upload__img')) {
                    console.log(response.data.id)
                    console.log(response.data.url)

                    let addImg = document.querySelector('.upload__img')

                    addImg.addEventListener('change', function (event){
                        console.log(response.data.url)

                        let newImg = document.createElement('img')

                        newImg.setAttribute("id", "img__preview")
                        document.querySelector('.images__preview').prepend(newImg)
                        newImg.className = "img__red";
                        newImg.dataset.id = response.data.id;
                        newImg.src = response.data.url;
                        console.log(newImg.src)

                        newImg.style.display = "block"
                    })
                }
            })
    })

}

// let upImg = document.querySelector('.upload__img')

// // if (imgsPrev.length !== 0) {
//     upImg.addEventListener('change', function (){
//         let newImg = document.createElement('img')
//
//         newImg.setAttribute("id", "img__preview")
//         newImg.className = "img__red"
//         console.log(imgsPrev)
//         newImg.src = imgsPrev[0];
//         console.log(imgsPrev)
//
//         document.querySelector('.images__preview').prepend(newImg)
//     // })
// }

/* Создание объявления */

let addAdvert = document.getElementById('addAdvert')

addAdvert.addEventListener('click', function (){
    let title = document.getElementById('title').value;
    let content = document.getElementById('content').value;
    let location = document.getElementById('location').value;
    let price = document.getElementById('price').value;

    let addAdvertPost = {
        title: title,
        content: content,
        location: location,
        price: price,
        image_ids: imageIds
    }

    axios.post('/advertisement/create', addAdvertPost)
        .then((response) =>{

            if (response.data.success) {
                alert('Объявление успешно загружено');
            } else {
                alert("Наебни говна олух");
            }
        });
})



let jsAdv = document.querySelector('#js_advert')

jsAdv.addEventListener('click', event => {
    let target = event.target;

    if (target.closest('.advertisement').querySelector('.redaction'))
    {
        let modalBD = document.querySelector('.modalBackdrop')

        let title = target.closest('.advertisement').querySelector('.ad__title').textContent
        let content = target.closest('.advertisement').querySelector('.ad__content').textContent
        let location = target.closest('.advertisement').querySelector('.ad__location').textContent
        let price = target.closest('.advertisement').querySelector('.ad__price').textContent
        let image = target.closest('.advertisement').querySelector('.adv_img').src

        // console.log(image)

        let titleRed = document.querySelector('.title__red').value = title;
        let contentRed = document.querySelector('.content__red').value = content;
        let locationRed = document.querySelector('.location__red').value = location;
        let priceRed = document.querySelector('.price__red').value = toInteger(price);
        let imageRed = document.querySelector('.img__red').src = image;

        modalBD.style.display = "block";
    }




    // console.log(target.closest('.redaction').eventPhase)

    // console.log(target.closest('.ad__title'))
    // let title = document.querySelector('.ad__title').textContent
    // let content = target.closest('.ad__content').textContent
    // let location = target.closest('.ad__location').textContent
    // let price = target.closest('.ad__price').textContent
    // let image = target.closest('.adv_img').sr

    // console.log(title)

    // if (!redaction)
    // {
    //     return
    //
    // } else {

    // if (document.querySelector('.advertisement__description'))
    // {
    //     let title = target.querySelector('.ad__title').textContent;
    //     console.log(title)
    // }
    //
    // console.log(target.closest('.advertisement'))
    //
    //     let modalBD = document.querySelector('.modalBackdrop')
    //
    //     let title = target.querySelector('.ad__title').textContent;
    //      console.log(title)
    //     let content = document.querySelector('.ad__content').textContent;
    //     let location = document.querySelector('.ad__location').textContent;
    //     let price = document.querySelector('.ad__price').textContent;
    //     let image = document.querySelector('.adv_img').src;
    //
    //     console.log(title)
    //
    //     let titleRed = document.querySelector('.title__red').value = title;
    //     let contentRed = document.querySelector('.content__red').value = content;
    //     let locationRed = document.querySelector('.location__red').value = location;
    //     let priceRed = document.querySelector('.price__red').value = toInteger(price);
    //     let imageRed = document.querySelector('.img__red').src = image;
    //
    //     modalBD.style.display = "block";
    // // }
})

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

function rmImg (id) {
    let image = document.querySelector(`#imgs img[data-id="${id}"]`);

    if (image)
    {
        image.remove()

        let index = imageIds.findIndex(item => item.id === id);

        if (index !== -1) {
            imageIds.splice(index, 1);
        }
    }
}


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
