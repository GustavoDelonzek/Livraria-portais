<template>
  <div class="container mx-auto p-6 space-y-8">
    <div class="flex justify-between items-center mb-6">
      <SearchBar @search="getAuthors" />
      <RouterLink to="/admin/authors/add"
        class="bg-red-300 hover:bg-red-400 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105">
        Adicionar Novo Autor
      </RouterLink>
    </div>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Author ID
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Date of Birth
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Nationality
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Actions
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="author in authors" :key="author.id" class="hover:bg-gray-100">
          <td class="px-6 py-4 text-sm text-gray-900">{{ author.id }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ author.name }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ author.date_of_birth }}</td>
          <td class="px-6 py-4 text-sm text-gray-900">{{ author.nationality }}</td>
          <td class="px-6 py-4 space-x-2 text-sm text-gray-900">
            <button @click.prevent="deleteAuthor(author.id)"
              class="bg-red-200 hover:bg-red-300 text-red-600 font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105">
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
  name: "Authors",
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
      authors: []
    };
  },
  created() {
    this.getAuthors();
  },
  methods: {
    async getAuthors(query = '') {
      let url = 'http://127.0.0.1:8000/api/search/authors';
      try {
        const response = await axios.get(url, { params: { query } });
        this.authors = response.data.authors;
      } catch (error) {
        console.error(error);
      }
    },
    async deleteAuthor(id) {
      let url = `http://127.0.0.1:8000/api/delete_author/${id}`;
      await axios.delete(url).then(response => {
        if (response.data.code === 200) {
          this.toast.success('Autor deletado com sucesso', {
            timeout: 1200
          });
          this.getAuthors();
        }
      }).catch(error => {
        console.log(error);
      });
    }
  }
};
</script>
