<template>
    <div class="grid  md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3  gap-6 p-6">
      <div v-for="book in books" :key="book.id" class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="relative">
          <img :src="book.img_url" :alt="book.title" class="w-full h-64 object-cover" />
          
        </div>
        <div class="p-4">
          <h3 class="font-bold text-lg mb-1 line-clamp-1">{{ book.title }}</h3>
          <p class="text-sm text-gray-600 mb-2">{{ book.author.name }}</p>
          <div class="flex items-center mb-2">
            
            <span class="text-sm text-gray-600 ml-1">3 estrelas</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-bold text-lg text-green-700">R${{ book.price }}</span>

            <RouterLink :to="{ name: 'shopBook', params: { id: book.id } }" class="px-3 py-1 bg-green-200 text-gray-800 rounded-full text-sm hover:bg-primary-dark">
              Shop
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </template>

<script>
export default {
    name: 'BookGrid',
    props: {
        books: {
            type: Array,
            required: true
        }
    }
}
</script>
