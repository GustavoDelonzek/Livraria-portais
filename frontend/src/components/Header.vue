<template>
  <div class="p-5 bg-white text-gray-800 shadow-md mx-auto flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <RouterLink to="/"><span class="text-2xl font-bold">Livraria</span></RouterLink>
    </div>

    <nav class="hidden md:flex space-x-8 mx-auto">
      <RouterLink to="/shop" class="text-md font-medium hover:text-gray-500 font-serif">Shop</RouterLink>
      <a href="#" class="text-md font-medium hover:text-gray-500 font-serif">Contact</a>
      <a href="#" class="text-md font-medium hover:text-gray-500 font-serif">Favorites</a>
    </nav>

    <div class="flex justify-center items-center gap-3 ">
      <RouterLink to="/cart" class="text-lg hover:text-gray-500 font-semibold relative">
        <ShoppingCart />
        <span v-if="cartItemCount > 0" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1 1">
          {{ cartItemCount }}
        </span>
      </RouterLink>
      <RouterLink to="/login" class="text-lg hover:text-gray-500 font-semibold">Login</RouterLink>
    </div>

    <div class="md:hidden flex items-center space-x-3">
      <button @click="toggleMenu" class="text-xl text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
      <div v-if="isMenuOpen" class="absolute top-20 right-5 bg-white shadow-lg rounded-md w-48 p-4 flex flex-col space-y-4">
        <RouterLink to="/shop" class="text-md font-medium hover:text-gray-500">Shop</RouterLink>
        <a href="#" class="text-md font-medium hover:text-gray-500">Contact</a>
        <a href="#" class="text-md font-medium hover:text-gray-500">Favorites</a>
      </div>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import { ShoppingCart } from 'lucide-vue-next';
import { ref } from 'vue';

export default {
  name: "Header",
  components: {
    ShoppingCart
  },
  data() {
    return {
      isMenuOpen: false, 
      cartItemCount: ref(0)
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    updateCartItemCount() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      this.cartItemCount = cart.reduce((total, item) => total + item.quantity, 0);
    },
    updateLocalStorageCart(cart) {
      localStorage.setItem('cart', JSON.stringify(cart));
      this.updateCartItemCount();
    }
  },
  mounted() {
    this.updateCartItemCount();  
    this.cartCheckInterval = setInterval(this.updateCartItemCount, 1000); 
  },
  beforeDestroy() {
    clearInterval(this.cartCheckInterval); 
  }
};
</script>

<style scoped>
</style>
