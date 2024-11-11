<template>
  <div class="p-5 bg-white text-gray-800 shadow-md container mx-auto flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <span class="text-2xl  font-bold">Livraria</span>
    </div>
    <nav class="flex space-x-8 mx-auto">
      <a href="#" class="text-md font-medium hover:text-gray-500 font-serif">Shop</a> 
      <a href="#" class="text-md font-medium hover:text-gray-500 font-serif">Authors</a>
      <a href="#" class="text-md font-medium hover:text-gray-500 font-serif">Publishers</a>
      <a href="#" class="text-md font-medium hover:text-gray-500 font-serif">Contact</a>
    </nav>
    <div>
      <RouterLink to="/login" class="text-lg  hover:text-gray-500 font-semibold">Login</RouterLink>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
export default {
  name: "Header"
};
</script>

<style scoped></style>
