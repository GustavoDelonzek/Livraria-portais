<template>
  <div class="container mx-auto p-6 space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
        <div>
          <h3 class="text-lg font-semibold text-gray-700">Total de Livros</h3>
          <p class="text-3xl font-bold text-gray-900">{{ totalBooks }}</p>
        </div>
        <div class="bg-blue-100 p-4 rounded-full text-blue-500">
          <i class="fas fa-book text-4xl"></i>
        </div>
      </div>

      <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
        <div>
          <h3 class="text-lg font-semibold text-gray-700">Livros Sem Estoque</h3>
          <p class="text-3xl font-bold text-gray-900">{{ booksOutStock }}</p>
        </div>
        <div class="bg-green-100 p-4 rounded-full text-green-500">
          <i class="fas fa-archive text-4xl"></i>
        </div>
      </div>

      <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
        <div>
          <h3 class="text-lg font-semibold text-gray-700">Livros Vendidos</h3>
          <p class="text-3xl font-bold text-gray-900">{{ booksSold }}</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-full text-yellow-500">
          <i class="fas fa-dollar-sign text-4xl"></i>
        </div>
      </div>
    </div>

    <div>
      <div class="flex justify-between items-center mb-6">
        <SearchBar @search="getBooks" />
        <RouterLink to="/admin/books/add"
          class="bg-red-300 hover:bg-red-400 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105">
          Add New Book
        </RouterLink>
      </div>

      <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Book ID
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Title
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Author
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Publisher
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Stock
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="book in books" :key="book.id" class="hover:bg-gray-100">
            <td class="px-6 py-4 text-sm text-gray-900">{{ book.id }}</td>
            <td class="px-6 py-4 text-sm text-gray-900">{{ book.title }}</td>
            <td class="px-6 py-4 text-sm text-gray-900">{{ book.author.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-900">{{ book.publisher.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-900">
              {{ book.stock }}
            </td>
            <td class="px-6 py-4 space-x-2 text-sm text-gray-900">
              <button @click.prevent="deleteBook(book.id)"
                class="bg-red-200 hover:bg-red-300 text-red-600 font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105">
                Delete
              </button>
              <StockModal :bookId="book.id" />
             
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>


<script>
import axios from 'axios';
import SearchBar from '@/components/SearchBar.vue';
import StockModal from '../../components/StockModal.vue'

import { useToast } from "vue-toastification";

export default {
  name: "books",
  components: {
    SearchBar,
    StockModal
  },

  setup() {
    const toast = useToast();

    return {
      toast
    }
  },
  data() {
    return {
      books: [],
      auxiliarBooks: [],
      outStock: [],
      totalBooks: 0,
      booksOutStock: 0,
      booksSold: 0,
    }
  },
  created() {
    this.getBooks();
    this.getAll();
    this.getOutStock();
    this.getSales();
  },
  methods: {
    async getBooks(query = '') {
      let url = 'http://127.0.0.1:8000/api/search/books';
      try {
        const response = await axios.get(url, { params: { query } });
        this.books = response.data.books;
      } catch (error) {
        console.error(error);
      }
    },
    async getAll() {
      let url = 'http://127.0.0.1:8000/api/books';
      try {
        const response = await axios.get(url);
        this.auxiliarBooks = response.data.books;
        this.totalBooks = this.auxiliarBooks.length
      } catch (error) {
        console.error(error);
      }
    },
    async getOutStock() {
      let url = 'http://127.0.0.1:8000/api/books/out_of_stock'
      try {
        const response = await axios.get(url);
        this.outStock = response.data.books;
        this.booksOutStock = this.outStock.length
      } catch (error) {
        console.error(error);
      }
    },
    async getSales() {
      let url = 'http://127.0.0.1:8000/api/total_sales'
      try {
        const response = await axios.get(url);
        this.booksSold = response.data.total;
      } catch (error) {
        console.error(error);
      }
    },
    async deleteBook(id) {
      let url = `http://127.0.0.1:8000/api/delete_book/${id}`;
      await axios.delete(url).then(response => {
        if (response.data.code == 200) {
          this.toast.success('Livro deletado com sucesso', {
            timeout: 1200
          })
          this.getBooks();
          this.getAll();
          this.getOutStock();
          this.getSales();
        }
      }).catch(error => {
        console.log(error);
      })
    }
  },
}
</script>
