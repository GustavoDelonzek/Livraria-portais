<template>
    <div class="contact-page min-h-[80vh] flex flex-col justify-center ">
      
  
      <div class="container  mx-auto px-4 py-12">
        <div class="grid  grid-cols-1 md:grid-cols-2 gap-10">
          <div class="space-y-6">
            <textarea
              v-model="form.message"
              placeholder="Message..."
              class="w-full h-64 p-4 bg-[#f8ffe5] rounded-md border border-[#466149] text-[#466149] focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <input
                v-model="form.name"
                type="text"
                placeholder="Your Name*"
                class="w-full p-3 bg-[#f8ffe5] rounded-md border border-[#466149] text-[#466149] focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
              >
              
              <input
                v-model="form.email"
                type="email"
                placeholder="Your Email*"
                class="w-full p-3 bg-[#f8ffe5] rounded-md border border-[#466149] text-[#466149] focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
              >
            </div>
            
            <button
              @click="handleSubmit"
              class="border border-[#EA907A] text-[#EA907A] py-2 px-4 hover:bg-[#EA907A] hover:text-white transition duration-300"
            >
              ENVIAR
            </button>
          </div>
  
          <div class="space-y-6">
            <h1 class="text-3xl  font-bold text-gray-800">Contact Our Stores - Pé de Livro</h1>
            
            <p class="text-gray-600">
              Seja bem-vindo ao Pé de Livro, onde histórias ganham vida! Entre em contato com a gente para tirar dúvidas, fazer encomendas ou saber mais sobre nossos eventos literários. Estamos sempre prontos para atender você!
            </p>
            
            <div class="space-y-4">
              <div class="flex items-center space-x-3 text-gray-600">
                <Phone size="23" />
                <a href="tel:+4456855231" class="hover:text-gray-800">+55 (42) 4567-1234</a>
              </div>
              
              <div class="flex items-center space-x-3 text-gray-600">
                <Printer size="23" />
                <a href="#" class="hover:text-gray-800">Aceitamos pedidos para imprimir seus documentos digitais com praticidade.</a>
              </div>
              
              <div class="flex items-center space-x-3 text-gray-600">
                <Mail size="23" />
                <a href="mailto:bridge@exemple.com" class="hover:text-gray-800"> contato@pedelivro.com.br</a>
              </div>
              
              <div class="flex items-center space-x-3 text-gray-600">
                <MapPin size="23" />
                <span>Rua das Palavras, 401, Jardim Literário, Guarapuava, PR, Brasil</span>
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
  