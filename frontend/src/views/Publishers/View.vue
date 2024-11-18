<template>
  <div class="container mx-auto p-6 space-y-8">
    <div class="flex justify-between items-center mb-6">
      <SearchBar @search="getPublishers" />
      <RouterLink 
        to="/admin/publishers/add" 
        class="bg-red-300 hover:bg-red-400 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105"
      >
        Adicionar Nova Editora
      </RouterLink>
    </div>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Publisher ID
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Address
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Website
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Contact
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Actions
          </th>
        </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="publisher in publishers" :key="publisher.id" class="hover:bg-gray-100">
          <td class="px-6 py-4 text-sm text-gray-900">{{ publisher.id }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ publisher.name }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ publisher.address }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ publisher.website || 'N/A' }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ publisher.contact }}</td>
          <td class="px-6 py-4 space-x-2 text-sm text-gray-900">
            <button 
              @click.prevent="deletePublisher(publisher.id)" 
              class="bg-red-200 hover:bg-red-300 text-red-600 font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105"
            >
              Deletar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <RouterView />
</template>

<script>
import axios from 'axios';
import SearchBar from '@/components/SearchBar.vue';
import { useToast } from "vue-toastification";

export default {
  name: "Publishers",
  components: {
    SearchBar
  },
  setup() {
    const toast = useToast();

    return {
      toast
    };
  },
  data() {
    return {
      publishers: []
    };
  },
  created() {
    this.getPublishers();
  },
  methods: {
    async getPublishers(query = '') {
      const url = 'http://127.0.0.1:8000/api/search/publishers';
      try {
        const response = await axios.get(url, { params: { query } });
        this.publishers = response.data.publishers;
      } catch (error) {
        console.error(error);
      }
    },
    async deletePublisher(id) {
      const url = `http://127.0.0.1:8000/api/delete_publisher/${id}`;
      try {
        const response = await axios.delete(url);
        if (response.data.code === 200) {
          this.toast.success('Editora deletada com sucesso', {
            timeout: 1200
          });
          this.getPublishers();
        }
      } catch (error) {
        console.error(error);
      }
    }
  }
};
</script>
