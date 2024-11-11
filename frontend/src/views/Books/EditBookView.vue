<template>
    <BookForm v-if="book.id" :initial-book="book" submit-button-text="Update Book" @submit="updateBook" />
  </template>
  
  <script>
  import axios from 'axios'
  import BookForm from '../../components/BookForm.vue'
  export default {
    name: 'EditBook',
    components: {
      BookForm
    },
    data() {
      return {
        book: {}
      }
    },
    created() {
      this.getBookById()
    },
    methods: {
      async getBookById() {
        const url = `http://127.0.0.1:8000/api/get_book/${this.$route.params.id}`
        try {
          const response = await axios.get(url)
          this.book = response.data
        } catch (error) {
          console.log(error)
        }
      },
      async updateBook(formData) {
        const url = `http://127.0.0.1:8000/api/update_book/${this.$route.params.id}`
        try {
          const response = await axios.post(url, formData)
          if (response.status === 200) {
            alert(response.data.message)
          }
        } catch (error) {
          console.log(error)
        }
      }
    }
  }
  </script>