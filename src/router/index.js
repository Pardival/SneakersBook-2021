import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Admin from '../views/Admin.vue'
import SneakersBio from '../views/SneakersBio.vue'
import NotFound404 from '../views/NotFound404.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/sneakers/:id',
    name: 'Sneakers',
    component: SneakersBio
  },

  {
    path: '/admin',
    name: 'Admin',
    component : Admin
  },

  {
    path: '*',
    name: '404',
    component: NotFound404
  },

]

const router = new VueRouter({
  routes
})

export default router
