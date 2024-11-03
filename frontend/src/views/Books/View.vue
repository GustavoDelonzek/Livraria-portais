<template>
  <div class="container mx-auto p-6">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Book ID
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Title
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Author
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Publisher
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Description
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="book in books" :key="book.id" class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.id }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.title }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.author_name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.publisher_name }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ book.description }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
  
<script>
  import axios from 'axios';
  export default{
    name: "books", 
    data() {
      return{
        books:Array
      }
    },
    created(){
      this.getBooks();
    },
    methods:{
      async getBooks(){
        let url = 'http://127.0.0.1:8000/api/books';
        await axios.get(url).then(response => (
          this.books = response.data.books,
        console.log(this.books)
        )).catch((error) => {
          console.log(error);
        });
      }
    },
    mounted(){
      console.log('Montado')
    }
  }
</script>