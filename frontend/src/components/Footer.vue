<template>
  <footer class="bg-gray-800 text-gray-300 py-10">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="space-y-4">
          <h2 class="text-2xl font-bold text-white">Livraria</h2>
          <p class="text-sm">Sua fonte confiável para livros e muito mais. Explore nosso vasto catálogo e descubra novas histórias.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <FacebookIcon size="20" />
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <TwitterIcon size="20" />
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <InstagramIcon size="20" />
            </a>
          </div>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4 text-white">Navegação Rápida</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-white transition-colors duration-300">Home</a></li>
            <li><a href="#" class="hover:text-white transition-colors duration-300">Catálogo</a></li>
            <li><a href="#" class="hover:text-white transition-colors duration-300">Novos Lançamentos</a></li>
            <li><a href="#" class="hover:text-white transition-colors duration-300">Ofertas Especiais</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4 text-white">Suporte</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-white transition-colors duration-300">FAQ</a></li>
            <li><a href="#" class="hover:text-white transition-colors duration-300">Política de Devolução</a></li>
            <li><a href="#" class="hover:text-white transition-colors duration-300">Termos de Serviço</a></li>
            <li><a href="#" class="hover:text-white transition-colors duration-300">Contato</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4 text-white">Newsletter</h3>
          <p class="text-sm mb-4">Fique por dentro das novidades e promoções exclusivas!</p>
          <form @submit.prevent="subscribeNewsletter" class="space-y-2">
            <input 
              type="email" 
              v-model="email" 
              placeholder="Seu e-mail" 
              class="w-full px-3 py-2 bg-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            >
            <button 
              type="submit" 
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors duration-300"
            >
              Inscrever-se
            </button>
          </form>
        </div>
      </div>
      
      <div class="mt-8 pt-8 border-t border-gray-800 text-sm text-center">
        <p>&copy; {{ currentYear }} Livraria. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { ref, computed } from 'vue'
import { FacebookIcon, TwitterIcon, InstagramIcon } from 'lucide-vue-next'

const email = ref('')

const currentYear = computed(() => new Date().getFullYear())

const subscribeNewsletter = () => {
  console.log(`Subscribed with email: ${email.value}`)
  email.value = ''
}
</script>