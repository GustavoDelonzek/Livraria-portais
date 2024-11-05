<template>
  <div class="container mx-auto p-6">
    <SearchBar @search="getBooks" />

    <div class="flex justify-end">

      <RouterLink to="/addBook" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Adicionar novo livro</RouterLink>
    </div>
    <table class="min-w-full bg-white border border-gray-200 my-8 rounded-lg overflow-hidden">
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
            Events
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="book in books" :key="book.id" class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.id }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.title }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.author_name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.publisher_name }}
          </td>

          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            <button @click.prevent="deleteBook(book.id)"
              class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">Delete</button>
            <RouterLink :to="{ name: 'editBook', params: { id: book.id } }"
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">
              Edit</RouterLink>
          </td>


        </tr>
      </tbody>
    </table>
  </div>
  <RouterView></RouterView>
</template>

<script>
import axios from 'axios';
import SearchBar from '@/components/SearchBar.vue';
export default {
  name: "books",
  components: {
    SearchBar,
  },
  data() {
    return {
      books: Array
    }
  },
  created() {
    this.getBooks();
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
    async deleteBook(id) {
      let url = `http://127.0.0.1:8000/api/delete_book/${id}`;
      await axios.delete(url).then(response => {
        if (response.data.code == 200) {
          alert(response.data.message);
          this.getBooks();
        }
      }).catch(error => {
        console.log(error);
      })
    }
  },
  mounted() {
    console.log('Montado')
  }
}
</script>