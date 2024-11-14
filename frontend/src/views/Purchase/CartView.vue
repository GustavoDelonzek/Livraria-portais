<template>
  <div class="max-w-3xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Carrinho de Compras</h1>

    <div v-if="cartItems.length === 0" class="text-center py-10 bg-gray-100 rounded-lg shadow-md">
      <p class="text-lg text-gray-600">Seu carrinho está vazio.</p>
      <RouterLink to="/shop"
        class="mt-4 inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
        Voltar à loja
      </RouterLink>
    </div>

    <div v-else>
      <ul class="divide-y divide-gray-200">
        <li v-for="item in cartItems" :key="item.id" class="py-4 flex justify-between items-center">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">{{ item.title }}</h3>
            <p class="text-sm text-gray-500">Preço: R$ {{ item.price }}</p>
            <p class="text-sm text-gray-500">Quantidade: {{ item.quantity }}</p>
          </div>
          <button @click="removeFromCart(item.id)"
            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Remover
          </button>
        </li>
      </ul>

      <div class="mt-8 p-6 bg-gray-100 rounded-lg shadow-md">
        <p class="text-xl font-semibold text-gray-800">Total: R$ {{ cartTotal.toFixed(2) }}</p>
        <button @click="checkout"
          class="mt-4 px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
          Finalizar Compra
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import axios from 'axios';

export default {
  name: 'CartView',
  data() {
    return {
      cartItems: [],
    };
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
    async checkout() {
      if (this.loading) return; // Evita múltiplos cliques durante o carregamento
      this.loading = true;

      const orderData = {
        items: this.cartItems.map(item => ({
          book_id: item.id,
          quantity: item.quantity
        }))
      };

      try {
        const response = await axios.post('http://127.0.0.1:8000/api/checkout', orderData);

        if (response.status === 200) {
          alert(response.data.message);
          localStorage.removeItem('cart');
          this.cartItems = [];
        }
      } catch (error) {
        console.error('Erro ao finalizar a compra', error);
        alert('Houve um erro ao finalizar a compra. Tente novamente.');
      } finally {
        this.loading = false;
      }
    },
  },
};

</script>