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
    async saveBook(formData) {
      const url = "http://127.0.0.1:8000/api/save_book";

      const response = await axios.post(url, formData);
      if (response.status === 200) {
        alert(response.data.message);
      }

    }
  }
}
</script>