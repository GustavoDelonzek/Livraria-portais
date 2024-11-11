<template>
  <AuthorForm v-if="author.id" :initial-author="author" submit-button-text="Update Author" @submit="updateAuthor" />
</template>

<script>
import axios from 'axios'
import AuthorForm from '../../components/AuthorForm.vue'

export default {
  name: 'EditAuthor',
  components: {
    AuthorForm
  },
  data() {
    return {
      author: {}
    }
  },
  created() {
    this.getAuthorById()
  },
  methods: {
    async getAuthorById() {
      const url = `http://127.0.0.1:8000/api/get_author/${this.$route.params.id}`
      try {
        const response = await axios.get(url)
        this.author = response.data
      } catch (error) {
        console.log(error)
      }
    },
    async updateAuthor(formData) {
      const url = `http://127.0.0.1:8000/api/update_author/${this.$route.params.id}`
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
