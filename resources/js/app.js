
require('./bootstrap');

window.Vue = require('vue').default;

// EXTRA
import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(require('vue-moment'));

// MAIN COMPONENT
import App from './components/App.vue';

// COMPONENTS
import Home from './components/Home.vue';
import Events from './components/Events.vue';
import Forum from './components/Forum.vue';
import About from './components/About.vue';
import NotFound from './components/NotFound.vue';
import Profile from './components/Profile.vue';

// ROUTES
const routes = [
    // MAIN ROUTES
    { path: '/', component: Home },
    { path: '/events', component: Events },
    { path: '/forum', component: Forum },
    { path: '/about', component: About },
    { path: '/profile', component: Profile },

    // IF ROUTE DOES NOT EXISTS
    { path: '/404', component: NotFound },
    { path: '*', redirect: '/404' },
]
const router = new VueRouter({
    mode: 'history',
    base: '/',
    fallback: true,
    routes
})
router.mode = 'html5'

// MOUNT OF VUE
// const app = new Vue({
//     router
// }).$mount('#app')

// MOUNT OF App.vue FILE
const app = new Vue({
    el: '#app',
  	router,
    render: h => h(App)
});