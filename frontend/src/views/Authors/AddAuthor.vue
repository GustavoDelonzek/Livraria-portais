<template>
    <AuthorForm :initial-author="{}" submit-button-text="Add Author" @submit="saveAuthor" />
  </template>
  
  <script>
  import axios from 'axios'
  import AuthorForm from '../../components/AuthorForm.vue'
  
  export default {
    name: 'AddAuthor',
    components: {
      AuthorForm
    },
    methods: {
      async saveAuthor(author) {
        const url = "http://127.0.0.1:8000/api/save_author"
        try {
          const response = await axios.post(url, author)
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
  