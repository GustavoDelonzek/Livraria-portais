import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import BookView from '../views/Books/View.vue'
import EditBook from '@/views/Books/EditBookView.vue'
import AuthorsView from '../views/Authors/View.vue'
import EditAuthorView from '@/views/Authors/EditAuthorView.vue'
import AddBookView from '../views/Books/AddBookView.vue'
import AddAuthorView from '@/views/Authors/AddAuthor.vue'
import PublisherView from '../views/Publishers/View.vue'
import EditPublisherView from '@/views/Publishers/EditPublisherView.vue'
import AddPublisherView from '@/views/Publishers/AddPublisherView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/addBook',
      name: 'addBook',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: AddBookView
    },
    {
      path: '/books',
      name: 'books',
      component: BookView
    },
    {
      name: 'editBook',
      path: '/books/edit/:id?',
      component: EditBook
    },
    {
      name: 'authors',
      path: '/authors',
      component: AuthorsView
    },
    {
      name: 'editAuthor',
      path: '/authors/edit/:id?',
      component: EditAuthorView
    },
    {
      name: 'addAuthor',
      path: '/addAuthor',
      component: AddAuthorView
    },
    {
      name: 'publishers',
      path: '/publishers',
      component: PublisherView
    },
    {
      name: 'editPublisher',
      path: '/publishers/edit/:id?',
      component: EditPublisherView
    },
    {
      name: 'addPublisher',
      path: '/addPublisher',
      component: AddPublisherView
    }
  ]
})

export default router
