
require('./bootstrap');
window.Vue =  require( 'vue');
import  vuetify from './vuetify.js'

Vue.component('navbar' , require('./components/navbar.vue').default);
new Vue({
    vuetify,
    el: '#app',
})
