import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/views/Home.vue'
import Courses from '@/views/Courses.vue'
import Register from '@/views/Register.vue'
import Message from '@/views/Message.vue'
import Login from '@/views/Login.vue'
import MyCourses from '@/views/MyCourses.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/courses',
    component: Courses
  },

  {
    path: '/register',
    component: Register
  },
  {
    path: '/message',
    component: Message
  },
  {
    path: '/login',
    component: Login
  }, 

  {
    path: '/mycourses',
    component: MyCourses
  },
                
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
