import Vue from 'vue'
import VueRouter from 'vue-router'
import Inicio from '../views/Inicio.vue'





import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import ListUsersView from '../views/ListUsersView.vue'
import ListCoursesView from '../views/ListCoursesView.vue'
import EditUserView from '../views/EditUserView.vue'
import EditCourseView from '../views/EditCourseView.vue'
import CoursesView from '../views/CoursesView.vue'
import AssingView from '../views/AssingView.vue'


Vue.use(VueRouter)

const routes = [
  {
    path:'/',
    name:'home',
    component: Inicio
  },
  {
    path:'/login',
    name:'Login',
    component: LoginView
  },
  {
    path:'/register',
    name:'RegisterView',
    component: RegisterView
  },
  {
    path:'/listUsers',
    name:'ListUsersView',
    component: ListUsersView
  },
  {
    path:'/listCourses',
    name:'ListCoursesView',
    component: ListCoursesView
  },
  {
    path:'/editUser/:id',
    name:'EditUserView',
    component: EditUserView
  },
  {
    path:'/editCourse/:id',
    name:'EditCourseView',
    component: EditCourseView
  },
  {
    path:'/courses',
    name:'CoursesView',
    component: CoursesView
  },
  {
    path:'/assing/:id',
    name:'AssingView',
    component: AssingView
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
