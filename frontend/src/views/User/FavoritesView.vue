<template>
    <div class="container mx-auto p-6">
      <h1 class="text-3xl font-bold mb-6 text-center text-green-600">Livros Preferidos</h1>
  
      <div v-if="bookmarks.length === 0" class="text-center text-gray-500">
        <p>Você ainda não adicionou livros aos favoritos.</p>
      </div>
  
      <div v-else>
        <div v-for="book in bookmarks" :key="book.id" class="flex items-center bg-white rounded-lg shadow-lg mb-6 p-6">
          <img :src="book.img_url" alt="Capa do livro" class="h-24 w-16 object-cover rounded-md mr-6 border-2 border-green-200">
          <div class="flex-1">
            <h2 class="text-2xl font-semibold text-gray-800">{{ book.title }}</h2>
            <p class="text-gray-600">{{ book.author.name }}</p>
            <div class="mt-4 flex space-x-6">
              <!-- Botão para adicionar ao carrinho -->
              <button @click="addToCart(book)" class="bg-green-200 hover:bg-green-300 text-green-800 font-semibold px-4 py-2 rounded-lg transition duration-200">
                Adicionar ao carrinho
              </button>
              <!-- Botão para redirecionar para a loja -->
              <button @click="goToStore(book)" class="bg-blue-200 hover:bg-blue-300 text-blue-800 font-semibold px-4 py-2 rounded-lg transition duration-200">
                Ver na loja
              </button>
              <!-- Botão para remover dos favoritos -->
              <button @click="removeBookmark(book)" class="bg-red-200 hover:bg-red-300 text-red-800 font-semibold px-4 py-2 rounded-lg transition duration-200">
                Remover dos favoritos
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        bookmarks: JSON.parse(localStorage.getItem('bookmarks')) || [] 
      };
    },
    methods: {
        addToCart(book) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingBook = cart.find(item => item.id === book.id);

            if (existingBook) {
                existingBook.quantity += 1;
            } else {
                cart.push({
                    ...book,
                    quantity: 1,
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${book.title} foi adicionado ao carrinho!`);
        },
  
      removeBookmark(book) {
        this.bookmarks = this.bookmarks.filter(item => item.id !== book.id);
        localStorage.setItem('bookmarks', JSON.stringify(this.bookmarks)); 
      },
  
      goToStore(book) {
        this.$router.push({ name: 'shopBook', params: { id: book.id } });; 
      }
    }
  };
  </script>
  
  <style scoped>
  </style>
  