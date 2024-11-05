<template>
  <div class="container mx-auto p-6">
    <div class="flex justify-end">
      
      <RouterLink to="/addAuthor" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Adicionar novo autor</RouterLink>
    </div>
    
    <table class="min-w-full bg-white border border-gray-200 my-8 rounded-lg overflow-hidden">
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
        <tr v-if="authors" v-for="author in authors" :key="author.id" class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ author.id }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ author.name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ author.date_of_birth }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ author.nationality }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            <button @click.prevent="deleteAuthor(author.id)" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">Delete</button>
            <RouterLink :to="{ name: 'editAuthor', params: { id: author.id } }" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">Edit</RouterLink>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <RouterView/>
</template>

<script>
import axios from 'axios';
export default {
  name: "Authors",
  data() {
    return {
      authors:Array
    };
  },
  created() {
    this.getAuthors();
  },
  methods: {
    async getAuthors() {
      const url = 'http://127.0.0.1:8000/api/authors';
      try {
        const response = await axios.get(url);
        this.authors = response.data.authors;
      } catch (error) {
        console.log(error);
      }
    },
    async deleteAuthor(id) {
      const url = `http://127.0.0.1:8000/api/delete_author/${id}`;
      try {
        const response = await axios.delete(url);
        if (response.data.code === 200) {
          alert(response.data.message);
          this.getAuthors(); 
        }
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>
