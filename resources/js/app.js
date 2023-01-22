import './bootstrap';
import axios from 'axios';
import { method } from 'lodash';
import {Modal} from 'bootstrap'

// forms

// const form = document.getElementById('form');
// const inputMessage = document.getElementById('input-message');

// form.addEventListener('submit', (event) => {
//     event.preventDefault();

//     axios.post('/chat-message', {
//         message: inputMessage.value
//     })
// })

// // login functions

// function getCookie(name){
//     const value = `; ${document.cookie}`;
//     const parts = value.split(`; ${name}=`);
//     if(parts.length === 2) {
//         return parts.pop().split(';').shift();
//     }
// }

// function request(url, options){
//     const csrfToken = getCookie('XSRF-TOKEN');
//     return fetch(url, {
//         headers: {
//             'content-type': 'application/json',
//             'accept': 'application/json',
//             'X-XSRF-TOKEN': decodeURIComponent(csrfToken);
//         },
//         withCredentials: 'inclue',
//         ...options,
//     });
// }

// function logout(){
//     return request('/logout', {
//         method: post
//     })
// }

// function login() {
//     return request('/login', {
//         method: 'POST',
//         body: JSON.stringify({email: 'paulo@hotmail.com', 'password': '123'})
//     })
// }

// // connected to chanell
const channel = window.Echo.channel('private.senha');
var audio = new Audio('http://127.0.0.1:8000/sounds/painel.mp3');

channel.subscribed(() => {
    console.log('conectado... senha');
}).listen('.nova-senha', (event) => {

    console.log('enviando...');
    window.livewire.emit('nova_senha_gerada', event);
    window.livewire.emit('showNewSenha', event);

}).listen('.chamar-senha', (event) => {
    console.log(event);

    var myModal = new Modal(document.getElementById('modalSenhaShow'));
    window.livewire.emit('senhaChamadaPainel', event);
    window.livewire.emit('senhaChamadaMonitor', event);
    myModal.show();
    audio.play();

    setTimeout(() => {
        myModal.hide();
    }, 5000);

});




