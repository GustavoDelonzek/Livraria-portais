<template>
    <div class="contact-page min-h-[80vh] flex flex-col justify-center ">
      
  
      <div class="container  mx-auto px-4 py-12">
        <div class="grid  grid-cols-1 md:grid-cols-2 gap-10">
          <div class="space-y-6">
            <textarea
              v-model="form.message"
              placeholder="Message..."
              class="w-full h-64 p-4 bg-gray-50 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <input
                v-model="form.name"
                type="text"
                placeholder="Your Name*"
                class="w-full p-3 bg-gray-50 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
              >
              
              <input
                v-model="form.email"
                type="email"
                placeholder="Your Email*"
                class="w-full p-3 bg-gray-50 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
              >
            </div>
            
            <button
              @click="handleSubmit"
              class="px-8 py-2 border-2 border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white transition-colors duration-300 uppercase text-sm tracking-wider"
            >
              Send
            </button>
          </div>
  
          <div class="space-y-6">
            <h1 class="text-3xl  font-bold text-gray-800">Contact Our Stores</h1>
            
            <p class="text-gray-600">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim qis
              veniam, trud exercitation ullamco laboris nisi ut aliquip consequat.
            </p>
            
            <div class="space-y-4">
              <div class="flex items-center space-x-3 text-gray-600">
                <Phone size="23" />
                <a href="tel:+4456855231" class="hover:text-gray-800">+445 685 52 31</a>
              </div>
              
              <div class="flex items-center space-x-3 text-gray-600">
                <Printer size="23" />
                <a href="#" class="hover:text-gray-800">Print out online documents</a>
              </div>
              
              <div class="flex items-center space-x-3 text-gray-600">
                <Mail size="23" />
                <a href="mailto:bridge@exemple.com" class="hover:text-gray-800">bridge@exemple.com</a>
              </div>
              
              <div class="flex items-center space-x-3 text-gray-600">
                <MapPin size="23" />
                <span>4019 Saint James Drive, York, PA</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer></Footer>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  
  import { Phone, Printer, Mail, MapPin } from 'lucide-vue-next'
  import Footer from '@/components/Footer.vue'
  
  
  const form = ref({
    message: '',
    name: '',
    email: ''
  })
  
  const handleSubmit = () => {
    if (!form.value.message || !form.value.name || !form.value.email) {
      alert('Preencha todos os campos para enviar!')
      return
    }
    
    console.log('Form submitted:', form.value)
    
    form.value = {
      message: '',
      name: '',
      email: ''
    }
  }
  
  </script>
  