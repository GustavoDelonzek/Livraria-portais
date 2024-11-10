import { createRouter, createWebHistory } from 'vue-router'



import HomeView from '../views/HomeView.vue'
import BookView from '../views/Books/View.vue'
import EditBook from '@/views/Books/EditBookView.vue'
import AuthorsView from '@/views/Authors/view.vue'
import EditAuthorView from '@/views/Authors/EditAuthorView.vue'
import AddBookView from '../views/Books/AddBookView.vue'
import AddAuthorView from '@/views/Authors/AddAuthor.vue'
import PublisherView from '../views/Publishers/View.vue'
import EditPublisherView from '@/views/Publishers/EditPublisherView.vue'
import AddPublisherView from '@/views/Publishers/AddPublisherView.vue'
import DashboardView from '@/views/Admin/DashboardView.vue'

import UserView from '@/views/User/view.vue'

import Login from '@/views/Login/view.vue'
import Register from '@/views/Register/view.vue'




const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin',
      component: DashboardView,
      children: [
        {
          path: 'home',
          name: 'adminHome',
          component: HomeView
        },
        {
          path: 'books',
          name: 'books',
          component: BookView
        },
        {
          path: 'books/add',
          name: 'addBook',
          component: AddBookView
        },
        {
          path: 'books/edit/:id?',
          name: 'editBook',
          component: EditBook
        },
        {
          path: 'authors',
          name: 'authors',
          component: AuthorsView
        },
        {
          path: 'authors/add',
          name: 'addAuthor',
          component: AddAuthorView
        },
        {
          path: 'authors/edit/:id?',
          name: 'editAuthor',
          component: EditAuthorView
        },
        {
          path: 'publishers',
          name: 'publishers',
          component: PublisherView
        },
        {
          path: 'publishers/add',
          name: 'addPublisher',
          component: AddPublisherView
        },
        {
          path: 'publishers/edit/:id?',
          name: 'editPublisher',
          component: EditPublisherView
        }
      ]
    },
  
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/',
    name: 'home',
    component: UserView
  }
  ]
}
)

export default router
