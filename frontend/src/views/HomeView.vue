<template>
  <div class="min-h-screen p-6">
    <div class="max-w-6xl mx-auto space-y-6">
      <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-4">
          <h2 class="text-xl font-semibold">Total de Vendas</h2>
          <div class="text-gray-600 text-sm">Pé de Livro</div>
        </div>
        <div class="text-3xl font-bold mb-6">R$ {{ totalSales }}</div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
          <div class="flex justify-between items-center mb-2">
            <div class="text-gray-600">Usuários Ativos</div>
          </div>
          <div class="text-xl font-semibold">{{ totalUsers }}</div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
          <div class="flex justify-between items-center mb-2">
            <div class="text-gray-600">Livros Ativos</div>
          </div>
          <div class="text-xl font-semibold">{{ totalBooks }}</div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Últimas Compras</h3>
          </div>
          <div class="space-y-4">
            <div v-for="order in orders" :key="order.id"
              class="flex items-center justify-between py-2 border-b border-gray-100">
              <div>
                <div class="font-medium">Compra #{{ order.id }}</div>
                <div class="text-sm text-gray-500">Data: {{ order.created_at }}</div>
              </div>
              <div>
                R$ {{ order.total }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      totalSales: 0,
      totalBooks: 0,
      totalUsers: 0,
      orders: [],
    };
  },
  methods: {
    async fetchTotalSales() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/orders/total_value');
        if (response.data.total === 0) {
          this.totalSales = 0;
        } else {
          this.totalSales = response.data.total;
        }
      } catch (error) {
        console.error('Erro ao obter o total de vendas:', error);
      }
    },
    async getAll() {
      let url = 'http://127.0.0.1:8000/api/books';
      try {
        const response = await axios.get(url);
        this.totalBooks = response.data.books.length;
      } catch (error) {
        console.error(error);
      }
    },
    async getTotalUsers() {
      let url = 'http://127.0.0.1:8000/api/users/total';
      try {
        const response = await axios.get(url);
        this.totalUsers = response.data.total_users;
      } catch (error) {
        console.error('Erro ao obter o total de usuários:', error);
      }
    },
    async getAllOrders() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/sales', {
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}` 
          }
        });
        ;
        this.orders = response.data.sales;
      } catch (error) {
        console.error('Erro ao obter as ordens:', error);
      }
    }
  },
  mounted() {
    this.fetchTotalSales();
    this.getAll();
    this.getTotalUsers();
    this.getAllOrders();
  },
};
</script>

<style scoped></style>
