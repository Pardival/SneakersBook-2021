import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import SneakersBio from '../views/SneakersBio.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/sneakers',
    name: 'Sneakers',
    component: SneakersBio
  }
]

const router = new VueRouter({
  routes
})

export default router
