<template>
  <div class="p-5 bg-[#BFD8AF] text-[#466149] shadow-2xl shadow-[#fff] mx-auto flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <RouterLink to="/" class="flex items-center"> <img class="w-12 h-12 object-contain mr-2" src="@/assets/Remove.png"> <span class="text-2xl font-bold font-serif"> Pé de Livro      </span></RouterLink>
    </div>

    <nav class="hidden md:flex space-x-8 mx-auto">
      <RouterLink to="/shop" class="text-md font-medium hover:text-gray-500 font-serif">Shop</RouterLink>
      <RouterLink to="/contact" class="text-md font-medium hover:text-gray-500 font-serif">Contact</RouterLink>
      <RouterLink to="/favorites" class="text-md font-medium hover:text-gray-500 font-serif">Favorites</RouterLink>
    </nav>

    <div class="flex justify-center items-center gap-3">
      <RouterLink to="/cart" class="text-lg hover:text-gray-500 font-semibold relative">
        <ShoppingCart />
        <span v-if="cartItemCount > 0" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">
          {{ cartItemCount }}
        </span>
      </RouterLink>

      <!-- User Dropdown -->
      <div v-if="userInfo" class="relative">
        <button
          @click="toggleUserDropdown"
          class="flex items-center text-sm font-medium text-gray-900 hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
          type="button"
        >
          {{ userInfo.name }}
          <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
          </svg>
        </button>

        <!-- Dropdown menu -->
        <div
          v-if="isDropdownOpen"
          class="absolute right-0 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
        >
          <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div class="truncate">{{ userInfo.email }}</div>
          </div>
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            <li>
              <RouterLink to="/my-purchases" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Minhas compras
              </RouterLink>
            </li>
            <li>
              <button
                @click="logout"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
              >
                Logout
              </button>
            </li>
          </ul>
        </div>
      </div>

      <RouterLink v-else to="/login" class="text-lg hover:text-gray-500 font-semibold">Login</RouterLink>
    </div>

    <div class="md:hidden flex items-center space-x-3">
      <button @click="toggleMenu" class="text-xl text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
      <div v-if="isMenuOpen" class="absolute top-20 right-5 bg-white shadow-lg rounded-md w-48 p-4 flex flex-col space-y-4">
        <RouterLink to="/shop" class="text-md font-medium hover:text-gray-500">Shop</RouterLink>
        <RouterLink to="/contact" class="text-md font-medium hover:text-gray-500">Contact</RouterLink>
        <RouterLink to="/favorites" class="text-md font-medium hover:text-gray-500">Favorites</RouterLink>
      </div>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import { ShoppingCart } from 'lucide-vue-next';
import { ref } from 'vue';
import { isLoggedIn, getUserInfo } from '@/router';

export default {
  name: "Header",
  components: { ShoppingCart },
  data() {
    return {
      isMenuOpen: false,
      isDropdownOpen: false,
      cartItemCount: 0,
      userInfo: null,
      cartCheckInterval: null,
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    toggleUserDropdown() {
      this.isDropdownOpen = !this.isDropdownOpen;
    },
    updateCartItemCount() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      this.cartItemCount = cart.reduce((total, item) => total + item.quantity, 0);
    },
    checkUser() {
      if (isLoggedIn()) {
        this.userInfo = getUserInfo();
      } else {
        this.userInfo = null;
      }
    },
    async logout() {
      try {
        const token = localStorage.getItem('token');
        const response = await fetch('http://localhost:8000/api/logout', {
          headers: {
            'Content-Type': 'application/json',
            Authorization: `Bearer ${token}`,
          },
          method: 'POST',
        });

        if (!response.ok) {
          console.warn('Erro no logout:', await response.text());
        }

        localStorage.removeItem('token');
        this.userInfo = null;
        this.$router.push('/login');
      } catch (error) {
        console.error('Erro ao realizar logout:', error);
      }
    },
  },
  mounted() {
    this.updateCartItemCount();
    this.checkUser();
    this.cartCheckInterval = setInterval(this.updateCartItemCount, 1000); 
  },
  beforeUnmount() {
    clearInterval(this.cartCheckInterval); 
  },
};
</script>
