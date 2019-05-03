

//import MyFooter from './../components/MyFooter.vue'
import Vue from 'vue'
import MyFooter from './../components/MyFooter.vue'

const components = { MyFooter, }

Object.entries(components).forEach(([name, component]) => {
  Vue.component(name, component)
})


