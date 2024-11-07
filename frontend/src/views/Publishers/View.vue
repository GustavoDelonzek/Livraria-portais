<template>
  <div class="container mx-auto p-6">
    <SearchBar @search="getPublishers" />
    <div class="flex justify-end">
      <RouterLink to="/addPublisher" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Adicionar nova editora</RouterLink>
    </div>

    <table class="min-w-full bg-white border border-gray-200 my-8 rounded-lg overflow-hidden">
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
        <tr v-if="publishers" v-for="publisher in publishers" :key="publisher.id" class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ publisher.id }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ publisher.name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ publisher.address }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ publisher.website || 'N/A' }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ publisher.contact }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            <button @click.prevent="deletePublisher(publisher.id)"
              class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">Delete</button>
            <RouterLink :to="{ name: 'editPublisher', params: { id: publisher.id } }"
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">
              Edit</RouterLink>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <RouterView />
</template>

<script>





import SearchBar from '@/components/SearchBar.vue';
import axios from 'axios';
export default {
  name: "Publishers",
  components: {
    SearchBar
  },
  data() {
    return {
      publishers: Array
    };
  },
  created() {
    this.getPublishers();
    
    initModals();
  },
  methods: {
    async getPublishers(query = '') {
      const url = 'http://127.0.0.1:8000/api/search/publishers';
      try {
        const response = await axios.get(url, { params: { query } });
        this.publishers = response.data.publishers;
      } catch (error) {
        console.log(error);
      }
    },
    async deletePublisher(id) {
      const url = `http://127.0.0.1:8000/api/delete_publisher/${id}`;
      try {
        const response = await axios.delete(url);
        if (response.data.code === 200) {
          alert(response.data.message);
          this.getPublishers();
        }
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>