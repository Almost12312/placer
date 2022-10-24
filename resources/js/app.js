import axios from 'axios'



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


let addAdvert = document.getElementById('addAdvert')

addAdvert.addEventListener('click', function (){
    let title = document.getElementById('title').value;
    let content = document.getElementById('content').value;
    let location = document.getElementById('location').value;
    let price = document.getElementById('price').value;
    let image = document.getElementById('image').value;

    let addAdvertPost = {
        title: title,
        content: content,
        location: location,
        price: price,
        image: image
    }

    axios.post('/createadv', addAdvertPost)
        .then((response) =>{

            if (response.data.success) {
                alert('Объявление успешно загружено');
            } else {
                alert("Наебни говна олух");
            }
        });
})

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
