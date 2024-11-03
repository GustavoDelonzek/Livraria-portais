<template>
  <main class="m-5">

    <div v-if="errors.length">
      <div v-for="(error, index) in errors" :key="index">
        <div
          class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
          role="alert">
          <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div>
            <span class="font-small">Warning alert! {{ error }}</span>
          </div>
        </div>

      </div>


    </div>


    <form class="max-w-md mx-auto" @submit.prevent="SaveBook" novalidate>

      <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="title"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.title" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input type="number" name="author_id"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.author_id" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Author
          ID</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input type="number" name="publisher_id"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.publisher_id" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Publisher
          ID</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="published_year"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.published_year" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Published
          Year</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="genre"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.genre" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="price"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.price" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input type="number" name="stock"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.stock" required />
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock</label>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " v-model="book.description" required></input>
        <label
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
      </div>

      <button type="submit"
        class="text-dark bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

  </main>
</template>


<script>
import axios from 'axios';

export default {
  name: 'addBook',
  data() {
    return {
      book: {},
      title: '',
      author_id: null,
      publisher_id: null,
      published_year: '',
      genre: '',
      price: null,
      stock: null,
      description: '',
      errors: []
    }
  },
  methods: {
    async SaveBook() {
      this.errors = [];
      if (!this.book.title) {
        this.errors.push("Title is required!");
      }
      if (!this.book.author_id) {
        this.errors.push("Author is required!");
      }
      if (!this.book.publisher_id) {
        this.errors.push("Publisher is required!");
      }
      if (!this.book.published_year) {
        this.errors.push("Published year is required!");
      }
      if (!this.book.genre) {
        this.errors.push("Genre is required!");
      }
      if (!this.book.price) {
        this.errors.push("Price is required!");
      }
      if (!this.book.stock) {
        this.errors.push("Stock is required!");
      }
      if (!this.book.description) {
        this.errors.push("Description is required!");
      }

      if (!this.errors.length) {
        let formData = new FormData();
        formData.append('title', this.book.title);
        formData.append('author_id', this.book.author_id);
        formData.append('publisher_id', this.book.publisher_id);
        formData.append('published_year', this.book.published_year);
        formData.append('genre', this.book.genre);
        formData.append('price', this.book.price);
        formData.append('stock', this.book.stock);
        formData.append('description', this.book.description);

        const url = "http://127.0.0.1:8000/api/save_book";

        try {
          const response = await axios.post(url, formData);
          if (response.status === 200) {
            this.book = {
              title: '',
              author_id: null,
              publisher_id: null,
              published_year: '',
              genre: '',
              price: null,
              stock: null,
              description: ''
            };

            alert(response.data.message);
          }
        } catch (error) {
          console.log(error)
        }

      }
    }
  }
}
</script>