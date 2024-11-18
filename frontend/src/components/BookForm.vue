<template>
    <main class="m-6 max-w-3xl mx-auto  p-8 rounded-xl shadow-lg">
     
  
      <form class="space-y-6" @submit.prevent="submitForm" novalidate>
        <!-- Title Input -->
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="title"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Title'"
            v-model="book.title"
            required
            :class="{'border-red-600': errors.title}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Title
          </label>
          <p v-if="errors.title" class="mt-1 text-xs text-red-600">{{ errors.title }}</p>
        </div>
  
        <!-- Author Select -->
        <div class="mb-6">
          <label for="author_id" class="block text-sm font-medium text-gray-900">Author</label>
          <select 
            v-model="book.author_id" 
            name="author_id" 
            class="form-select mt-1 block w-full p-3 bg-blue-100 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{'border-red-600': errors.author_id}">
            <option value="" disabled>Select an author</option>
            <option v-for="author in authors" :key="author.id" :value="author.id">{{ author.name }}</option>
          </select>
          <p v-if="errors.author_id" class="mt-1 text-xs text-red-600">{{ errors.author_id }}</p>
        </div>
  
        <!-- Publisher Select -->
        <div class="mb-6">
          <label for="publisher_id" class="block text-sm font-medium text-gray-900">Publisher</label>
          <select 
            v-model="book.publisher_id" 
            name="publisher_id" 
            class="form-select mt-1 block w-full p-3 bg-blue-100 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="{'border-red-600': errors.publisher_id}">
            <option value="" disabled>Select a publisher</option>
            <option v-for="publisher in publishers" :key="publisher.id" :value="publisher.id">{{ publisher.name }}</option>
          </select>
          <p v-if="errors.publisher_id" class="mt-1 text-xs text-red-600">{{ errors.publisher_id }}</p>
        </div>
  
        <!-- Year of Publication Input -->
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="number"
            name="published_year"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Published Year'"
            v-model="book.published_year"
            required
            :class="{'border-red-600': errors.published_year}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Published Year
          </label>
          <p v-if="errors.published_year" class="mt-1 text-xs text-red-600">{{ errors.published_year }}</p>
        </div>
  
        <!-- Genres Selection -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900">Genres</label>
          <div class="flex flex-wrap gap-4 mt-2">
            <button
              v-for="genre in genres"
              :key="genre.id"
              type="button"
              @click="toggleGenre(genre.id)"
              :class="{
                'px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm transition-all duration-300': !selectedGenres.includes(genre.id),
                'px-4 py-2 bg-blue-500 text-white rounded-full text-sm transition-all duration-300': selectedGenres.includes(genre.id)
              }"
            >
              {{ genre.name }}
            </button>
          </div>
          <p v-if="errors.genres" class="mt-1 text-xs text-red-600">{{ errors.genres }}</p>
        </div>
  
        <!-- Price and Stock Inputs -->
        <div class="grid grid-cols-2 gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="number"
              name="price"
              class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
              :placeholder="'Price'"
              v-model="book.price"
              required
              :class="{'border-red-600': errors.price}"
            />
            <label
              class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
            >
              Price
            </label>
            <p v-if="errors.price" class="mt-1 text-xs text-red-600">{{ errors.price }}</p>
          </div>
  
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="number"
              name="stock"
              class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
              :placeholder="'Stock'"
              v-model="book.stock"
              required
              :class="{'border-red-600': errors.stock}"
            />
            <label
              class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
            >
              Stock
            </label>
            <p v-if="errors.stock" class="mt-1 text-xs text-red-600">{{ errors.stock }}</p>
          </div>
        </div>
  
        <!-- Description Input -->
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="description"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Description'"
            v-model="book.description"
            required
            :class="{'border-red-600': errors.description}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Description
          </label>
          <p v-if="errors.description" class="mt-1 text-xs text-red-600">{{ errors.description }}</p>
        </div>
  
        <!-- Image Upload -->
        <div class="mb-6">
          <label for="image" class="block text-sm font-medium text-gray-900">Image</label>
          <input 
            type="file" 
            name="image" 
            @change="handleFileUpload" 
            class="block w-full p-3 text-sm border border-blue-300 rounded-lg bg-blue-50 focus:ring-2 focus:ring-blue-500"
            accept="image/*" 
          />
          <p v-if="errors.image" class="mt-1 text-xs text-red-600">{{ errors.image }}</p>
        </div>
  
        <!-- Submit Button -->
        <button 
          type="submit" 
          class="w-full px-6 py-3 bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500 font-semibold rounded-lg shadow-md transition duration-300 transform hover:scale-105">
          {{ submitButtonText }}
        </button>
      </form>
    </main>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
      name: 'BookForm',
      props: {
          initialBook: { type: Object, required: true },
          submitButtonText: { type: String, default: 'Submit' }
      },
      data() {
          return {
              book: { ...this.initialBook },
              errors: {
                  title: '',
                  author_id: '',
                  publisher_id: '',
                  published_year: '',
                  genres: '',
                  price: '',
                  stock: '',
                  description: '',
                  image: ''
              },
              authors: [],
              publishers: [],
              genres: [],
              selectedGenres: []
          };
      },
      async created() {
          try {
              const [authorsResponse, publishersResponse, genresResponse] = await Promise.all([
                  axios.get('http://127.0.0.1:8000/api/authors'),
                  axios.get('http://127.0.0.1:8000/api/publishers'),
                  axios.get('http://127.0.0.1:8000/api/genres')
              ]);
              this.authors = authorsResponse.data.authors;
              this.publishers = publishersResponse.data.publishers;
              this.genres = genresResponse.data.genres;
          } catch (error) {
              console.error('Error loading authors, publishers, or genres:', error);
          }
      },
      methods: {
          handleFileUpload(event) {
              this.errors.image = '';
              const file = event.target.files[0];
              if (file && file.size > 2 * 1024 * 1024) {
                  this.errors.image = "Image size must not exceed 2MB.";
                  this.book.image = null;
              } else {
                  this.book.image = file;
              }
          },
          validateForm() {
              this.errors = {};  // Reset errors
              let isValid = true;
  
              if (!this.book.title) {
                  this.errors.title = "Title is required!";
                  isValid = false;
              }
              if (!this.book.author_id) {
                  this.errors.author_id = "Author is required!";
                  isValid = false;
              }
              if (!this.book.publisher_id) {
                  this.errors.publisher_id = "Publisher is required!";
                  isValid = false;
              }
              if (!this.book.published_year) {
                  this.errors.published_year = "Published year is required!";
                  isValid = false;
              }
              if (!this.book.genres.length) {
                  this.errors.genres = "At least one genre is required!";
                  isValid = false;
              }
              if (!this.book.price) {
                  this.errors.price = "Price is required!";
                  isValid = false;
              }
              if (!this.book.stock) {
                  this.errors.stock = "Stock is required!";
                  isValid = false;
              }
              if (!this.book.image) {
                  this.errors.image = "Image is required and must be less than 2MB!";
                  isValid = false;
              }
  
              return isValid;
          },
          toggleGenre(genreId) {
              const index = this.selectedGenres.indexOf(genreId);
              if (index === -1) {
                  this.selectedGenres.push(genreId);
              } else {
                  this.selectedGenres.splice(index, 1);
              }
              this.book.genres = this.selectedGenres;
          },
          submitForm() {
              if (this.validateForm()) {
                  const formData = new FormData();
                  formData.append('title', this.book.title);
                  formData.append('author_id', this.book.author_id);
                  formData.append('publisher_id', this.book.publisher_id);
                  formData.append('published_year', this.book.published_year);
                  formData.append('price', this.book.price);
                  formData.append('stock', this.book.stock);
                  formData.append('description', this.book.description);
                  formData.append('image', this.book.image);
  
                  this.book.genres.forEach(genreId => {
                      formData.append('genres[]', genreId);
                  });
  
                  this.$emit('submit', formData);
              }
          }
      }
  }
  </script>
  
  <style scoped>
  /* Smooth transitions */
  input, select, button {
    transition: all 0.3s ease;
  }
  button {
    cursor: pointer;
  }
  </style>
  