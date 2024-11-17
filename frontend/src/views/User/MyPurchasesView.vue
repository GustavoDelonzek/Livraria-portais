<template>
    <div class="max-w-4xl mx-auto p-4">
      <h1 class="text-3xl font-semibold mb-6">Meus Pedidos</h1>
  
      <div v-if="isLoading" class="text-center">
        <svg class="animate-spin h-10 w-10 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 1 1 16 0 8 8 0 1 1-16 0"></path>
        </svg>
        <p class="mt-4">Carregando...</p>
      </div>
  
      <div v-if="orders.length === 0 && !isLoading" class="text-center text-gray-500">
        <p>Você ainda não fez nenhum pedido.</p>
      </div>
  
      <div v-else>
        <div v-for="order in orders" :key="order.id" class="bg-white shadow-md rounded-lg p-6 mb-4">
          <h4 class="text-xl font-bold text-gray-800">Pedido #{{ order.id }}</h4>
          <p class="text-gray-600 mt-2">Status: <span :class="order.status === 'completed' ? 'text-green-600' : 'text-yellow-600'">{{ order.status }}</span></p>
          <p class="text-lg font-semibold mt-2">Total: R$ {{ order.total.replace('.', ',') }}</p>
  
          <h5 class="text-lg font-semibold mt-4">Itens do Pedido:</h5>
          <ul class="space-y-3 mt-2">
            <li v-for="item in order.order_items" :key="item.id" class="border-b pb-3">
              <div class="flex justify-between">
                <span class="font-medium text-gray-700">{{ item.book.title }}</span>
                <span class="text-gray-500">R$ {{ item.price.replace('.', ',') }} x {{ item.quantity }}</span>
              </div>
              <div class="flex justify-between mt-1 text-sm text-gray-500">
                <span>Subtotal:</span>
                <span class="font-medium">R$ {{ (item.price * item.quantity) }}</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        orders: [],
        isLoading: true,
      };
    },
    mounted() {
      this.fetchOrders();
    },
    methods: {
      async fetchOrders() {
        const token = localStorage.getItem('token')
        try {
          const response = await axios.get('http://127.0.0.1:8000/api/orders', {
            headers: {
              Authorization: `Bearer ${token}`, 
            }
          });
          this.orders = response.data.orders;
        } catch (error) {
          console.error('Erro ao buscar pedidos:', error);
        } finally {
          this.isLoading = false;
        }
      },
    },
  };
  </script>
  
  <style scoped>
  </style>
  