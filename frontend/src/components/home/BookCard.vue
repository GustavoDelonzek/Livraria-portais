<template>
    <div class="flex flex-col items-center bg-white p-4">
      <img :src="image" alt="Capa do Livro" class="w-48 h-64 object-cover rounded-md mb-4">
      <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ title }}</h2>
      <p class="text-lg text-gray-600">R$ {{ price }}</p>
    </div>
  </template>
  
  <script>
  export default {
    name: "BookCard",
    props: {
      image: {
        type: String,
        required: true
      },
      title: {
        type: String,
        required: true
      },
      price: {
        type: String,
        required: true
      }
    }
  };
  </script>
  
  <style scoped>
  </style>
  