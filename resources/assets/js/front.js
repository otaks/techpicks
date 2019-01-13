/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./front/bootstrap')

window.Vue = require('vue')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/Home.vue'))
Vue.component('my-page', require('./components/MyPage.vue'))
Vue.component('like', require('./components/Like.vue'))
Vue.component('post-form', require('./components/PostForm.vue'))
Vue.component('delete-pick', require('./components/DeletePick.vue'))

const app = new Vue({
  el: '#app'
})
