<template>
  <div class="max-w-3xl min-h-[75vh] my-6  mx-auto p-6">
    <h1 class="text-3xl  font-bold mb-6 text-gray-800">Carrinho de Compras</h1>

    <div v-if="cartItems.length === 0" class="text-center py-10 bg-gray-100 rounded-lg shadow-md">
      <p class="text-lg text-gray-600">Seu carrinho está vazio.</p>
      <RouterLink to="/shop"
        class="mt-4 inline-block px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-blue-600 transition">
        Voltar à loja
      </RouterLink>
    </div>

    <div v-else>
      <ul class="divide-y divide-gray-200">
        <li v-for="item in cartItems" :key="item.id" class="py-4 flex justify-between items-center">
          <div class="flex items-center space-x-4">
            <img :src="item.img_url" alt="Capa do livro" class="h-24 w-16 object-cover rounded-md">
            <div>
              <h3 class="text-lg font-semibold text-gray-800">{{ item.title }}</h3>
              <p class="text-sm text-gray-500">Preço: R$ {{ item.price }}</p>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
              <button @click="decreaseQuantity(item)" class="px-2 py-1 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                -
              </button>
              <span class="text-lg font-semibold text-gray-800">{{ item.quantity }}</span>
              <button @click="increaseQuantity(item)" class="px-2 py-1 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                +
              </button>
            </div>
            <button @click="removeFromCart(item.id)" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
              Remover
            </button>
          </div>
        </li>
      </ul>

      <div class="mt-8 p-6 bg-gray-100 rounded-lg shadow-md">
        <p class="text-xl font-semibold text-gray-800">Total: R$ {{ cartTotal.toFixed(2) }}</p>
        <button @click="checkout" class="mt-4 px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
          Finalizar Compra
        </button>
      </div>
    </div>
  </div>
  <Footer></Footer>
</template>

<script>
import { RouterLink } from 'vue-router';
import axios from 'axios';
import { isLoggedIn } from '@/router/index';
import { useToast } from 'vue-toastification';
import Footer from '@/components/Footer.vue';
export default {
  name: 'CartView',
  data() {
    return {
      cartItems: [],
      loading: false
    };
  },
  components:{
    Footer
  },
  setup(){
    const toast = useToast();
    return{
      toast
    }
  },
  computed: {
    cartTotal() {
      return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
    },
  },
  created() {
    this.loadCart();
  },
  methods: {
  loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    this.cartItems = cart;
  },
  removeFromCart(id) {
    this.cartItems = this.cartItems.filter(item => item.id !== id);
    this.updateCart();
  },
  updateCart() {
    localStorage.setItem('cart', JSON.stringify(this.cartItems));
  },
  increaseQuantity(item) {
    if (item.quantity < item.stock) { 
      item.quantity += 1;
      this.updateCart();
    } else {
      this.toast.warning('Quantidade máxima em estoque atingida.', {
        timeout: 1600,
      });
    }
  },
  decreaseQuantity(item) {
    if (item.quantity > 1) {
      item.quantity -= 1;
      this.updateCart();
    }
  },
  async checkout() {
    if (isLoggedIn()) {
      if (this.loading) return;
      this.loading = true;

      const orderData = {
        items: this.cartItems.map(item => ({
          book_id: item.id,
          quantity: item.quantity
        }))
      };

      try {
        const token = localStorage.getItem('token');
        const response = await axios.post('http://127.0.0.1:8000/api/checkout', orderData, {
          headers: {
            Authorization: `Bearer ${token}`
          }
        });

        if (response.status === 200) {
          this.toast.success(response.data.message, {
            timeout: 1600
          });
          localStorage.removeItem('cart');
          this.cartItems = [];
        }
      } catch (error) {
        console.error('Erro ao finalizar a compra', error.response.data);
        this.toast.error(error.response.data.error, {
          timeout: 2000
        });
      } finally {
        this.loading = false;
      }
    } else {
      this.toast.error("Você precisa estar logado para finalizar a compra.", { timeout: 2000 });
    }
  },
}
}

</script>

<style scoped>
</style>
