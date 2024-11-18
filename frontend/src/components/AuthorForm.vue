<template>
    <main class="m-6 max-w-3xl mx-auto p-8 rounded-xl shadow-lg">
      <form class="space-y-6" @submit.prevent="submitForm" novalidate>
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="name"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Name'"
            v-model="author.name"
            required
            :class="{'border-red-600': errors.name}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Name
          </label>
          <p v-if="errors.name" class="mt-1 text-xs text-red-600">{{ errors.name }}</p>
        </div>
  
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="date_of_birth"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Date of Birth'"
            v-model="author.date_of_birth"
            required
            @input="applyDateMask"
            :class="{'border-red-600': errors.date_of_birth}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Date of Birth
          </label>
          <p v-if="errors.date_of_birth" class="mt-1 text-xs text-red-600">{{ errors.date_of_birth }}</p>
        </div>
  
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="nationality"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Nationality'"
            v-model="author.nationality"
            required
            :class="{'border-red-600': errors.nationality}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Nationality
          </label>
          <p v-if="errors.nationality" class="mt-1 text-xs text-red-600">{{ errors.nationality }}</p>
        </div>
  
        <!-- Biography Input -->
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="bio"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Biography'"
            v-model="author.bio"
            required
            :class="{'border-red-600': errors.bio}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Biography
          </label>
          <p v-if="errors.bio" class="mt-1 text-xs text-red-600">{{ errors.bio }}</p>
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
          Enviar
        </button>
      </form>
    </main>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'AuthorForm',
    props: {
      initialAuthor: { type: Object, required: true }
    },
    data() {
      return {
        author: { ...this.initialAuthor },
        errors: {
          name: '',
          date_of_birth: '',
          nationality: '',
          bio: '',
          image: ''
        },
        selectedImage: this.initialAuthor.img_url || null 
      };
    },
    methods: {
  
      handleFileUpload(event) {
        this.errors.image = '';
        const file = event.target.files[0];
        if (file && file.size > 2 * 1024 * 1024) {
          this.errors.image = "Image size must not exceed 2MB.";
          this.selectedImage = null;
        } else {
          this.selectedImage = file;
        }
      },
  
      validateForm() {
        this.errors = {};
        let isValid = true;
  
        if (!this.author.name) {
          this.errors.name = "Name is required!";
          isValid = false;
        }
        if (!this.author.date_of_birth) {
          this.errors.date_of_birth = "Date of Birth is required!";
          isValid = false;
        }
        if (!this.author.nationality) {
          this.errors.nationality = "Nationality is required!";
          isValid = false;
        }
        if (!this.author.bio) {
          this.errors.bio = "Biography is required!";
          isValid = false;
        }
        if (!this.selectedImage) {
          this.errors.image = "Image is required and must be less than 2MB!";
          isValid = false;
        }
  
        return isValid;
      },
  
      submitForm() {
        console.log(this.selectedImage)
        if (this.validateForm()) {
          const formData = new FormData();
          formData.append('name', this.author.name);
          formData.append('date_of_birth', this.author.date_of_birth);
          formData.append('nationality', this.author.nationality);
          formData.append('bio', this.author.bio);
          if (this.selectedImage) {
            formData.append('image', this.selectedImage);
          }
  
          this.$emit('submit', formData);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  input, select, button {
    transition: all 0.3s ease;
  }
  button {
    cursor: pointer;
  }
  </style>
  