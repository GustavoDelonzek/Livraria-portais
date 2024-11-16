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
import ContactView from '@/views/Contact/View.vue'
import UserView from '@/views/User/view.vue'
import ShopView from '@/views/User/ShopView.vue'

import Login from '@/views/Login/view.vue'
import Register from '@/views/Register/view.vue'
import ShopBookView from '@/views/User/ShopBookView.vue'
import CartView from '@/views/Purchase/CartView.vue'

import { createRouter, createWebHistory } from 'vue-router'
import { jwtDecode } from "jwt-decode"


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin',
      component: DashboardView,
      meta: { requiresAuth: true, requiresAdmin: true },
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
    },
    {
      path: '/shop',
      name: 'shop',
      component: ShopView
    },
    {
      path: '/shop/book/:id?',
      name: 'shopBook',
      component: ShopBookView
    },
    {
      path: '/cart',
      name: 'cart',
      component: CartView
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView
    }
  ]
}
)

export function isLoggedIn() {
  const token = localStorage.getItem('token');
  return token !== null; 
}

export function getUserRole() {
  const token = localStorage.getItem('token');
  if (!token) {
    return null;
  }

  try {
    const decodedToken = jwtDecode(token);
    return decodedToken.role; 
  } catch (error) {
    console.error('Erro ao decodificar o token:', error);
    return null;
  }
}



router.beforeEach((to, from, next) => {
  console.log('Rota solicitada:', to.path, 'Role:', getUserRole());
  
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!isLoggedIn()) {
      console.log('Usuário não autenticado, redirecionando para login');
      next({ path: '/login' });
    } else {
      const role = getUserRole();
      if (to.matched.some(record => record.meta.requiresAdmin)) {
        if (role === 'admin') {
          console.log('Usuário Administrador autenticado, acesso permitido');
          next();
        } else {
          console.log('Usuário não é administrador, acesso negado');
          next({ path: '/' });
        }
      } else {
        console.log('Usuário autenticado, acesso permitido');
        next(); 
      }
    }
  } else {
    next(); // Permite acesso às rotas públicas
  }
});



export default router
