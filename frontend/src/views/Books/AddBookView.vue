<template>
  <BookForm :initial-book="{}" submit-button-text="Add Book" @submit="saveBook" />
</template>

<script>
import axios from 'axios'
import BookForm from '../../components/BookForm.vue'

export default {
  name: 'AddBook',
  components: {
    BookForm
  },
  methods: {
    async saveBook(book) {
      const url = "http://127.0.0.1:8000/api/save_book"
      try {
        const response = await axios.post(url, book)
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