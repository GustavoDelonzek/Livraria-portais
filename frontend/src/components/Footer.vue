<template>
  <footer class="bg-[#BFD8AF] text-[#466149]  py-10">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="space-y-4">
          <h2 class="text-2xl font-bold text-[#466149] flex items-center"><img class="w-12 h-12 object-contain mr-2" src="@/assets/Remove.png"> <span class="text-2xl font-bold font-serif"> Pé de Livro </span></h2>
          <p class="text-sm">Sua fonte confiável para livros e muito mais. Explore nosso vasto catálogo e descubra novas histórias.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-[#466149] hover:text-gray-300 transition-colors duration-300">
              <FacebookIcon size="20" />
            </a>
            <a href="#" class="text-[#466149] hover:text-gray-300 transition-colors duration-300">
              <TwitterIcon size="20" />
            </a>
            <a href="#" class="text-[#466149] hover:text-gray-300 transition-colors duration-300">
              <InstagramIcon size="20" />
            </a>
          </div>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4 text-[#466149]">Navegação Rápida</h3>
          <ul class="space-y-2">
            <li><RouterLink to="/" href="#" class="hover:text-[#466149] transition-colors duration-300">Home</RouterLink></li>
            <li><RouterLink to="/shop" href="#" class="hover:text-[#466149] transition-colors duration-300">Catálogo</RouterLink></li>
            <li><RouterLink to="/shop" href="#" class="hover:text-[#466149] transition-colors duration-300">Novos Lançamentos</RouterLink></li>
            <li><RouterLink to="/shop" href="#" class="hover:text-[#466149] transition-colors duration-300">Ofertas Especiais</RouterLink></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4 text-[#466149]">Suporte</h3>
          <ul class="space-y-2">
            <li><a  class="hover:text-[#466149] transition-colors duration-300">FAQ</a></li>
            <li><a  class="hover:text-[#466149] transition-colors duration-300">Política de Devolução</a></li>
            <li><a  class="hover:text-[#466149] transition-colors duration-300">Termos de Serviço</a></li>
            <li><RouterLink to="/contact" class="hover:text-[#466149] transition-colors duration-300">Contato</RouterLink></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4 text-[#466149]">Newsletter</h3>
          <p class="text-sm mb-4">Fique por dentro das novidades e promoções exclusivas!</p>
          <form @submit.prevent="subscribeNewsletter" class="space-y-2">
            <input 
              type="email" 
              v-model="email" 
              placeholder="Seu e-mail" 
              class="w-full px-3 py-2 bg-gray-100 border-[#466149] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            >
            <button 
              type="submit" 
              class="w-full bg-[#466149] text-white py-2 px-4 rounded-md  hover:scale-105 duration-300"
            >
              Inscrever-se
            </button>
          </form>
        </div>
      </div>
      
      <div class="mt-8 pt-8 border-t border-[#466149] text-sm text-center">
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