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
