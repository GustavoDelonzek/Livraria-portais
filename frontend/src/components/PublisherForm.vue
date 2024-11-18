<template>
    <main class="m-6 max-w-3xl mx-auto p-8 rounded-xl shadow-lg">
      <form class="space-y-6" @submit.prevent="submitForm" novalidate>
        
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="name"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Name'"
            v-model="publisher.name"
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
            name="address"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Address'"
            v-model="publisher.address"
            required
            :class="{'border-red-600': errors.address}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Address
          </label>
          <p v-if="errors.address" class="mt-1 text-xs text-red-600">{{ errors.address }}</p>
        </div>
  
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="website"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Website'"
            v-model="publisher.website"
            :class="{'border-red-600': errors.website}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Website
          </label>
          <p v-if="errors.website" class="mt-1 text-xs text-red-600">{{ errors.website }}</p>
        </div>
  
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="contact"
            class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer placeholder-transparent"
            :placeholder="'Contact'"
            v-model="publisher.contact"
            required
            :class="{'border-red-600': errors.contact}"
          />
          <label
            class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
          >
            Contact
          </label>
          <p v-if="errors.contact" class="mt-1 text-xs text-red-600">{{ errors.contact }}</p>
        </div>
  
        <button 
          type="submit"
          class="w-full px-6 py-3 bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500 font-semibold rounded-lg shadow-md transition duration-300 transform hover:scale-105"
        >
          {{ submitButtonText }}
        </button>
      </form>
    </main>
  </template>
  
  <script>
  import { useToast } from 'vue-toastification';
  export default {
    name: 'PublisherForm',
    props: {
      initialPublisher: { type: Object, required: true },
      submitButtonText: { type: String, default: 'Submit' }
    },
    data() {
      return {
        publisher: { ...this.initialPublisher },
        errors: {
          name: '',
          address: '',
          website: '',
          contact: ''
        }
      };
    },
    methods: {
      validateForm() {
        this.errors = {};
        let isValid = true;
  
        if (!this.publisher.name) {
          this.errors.name = 'Name is required!';
          isValid = false;
        }
        if (!this.publisher.address) {
          this.errors.address = 'Address is required!';
          isValid = false;
        }
        if (!this.publisher.contact) {
          this.errors.contact = 'Contact is required!';
          isValid = false;
        }
  
        return isValid;
      },
      submitForm() {
        if (this.validateForm()) {
          this.$emit('submit', this.publisher);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  input {
    transition: all 0.3s ease;
  }
  button {
    cursor: pointer;
  }
  </style>
  