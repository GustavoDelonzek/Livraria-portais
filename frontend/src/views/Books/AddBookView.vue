<template>
  <BookForm :initial-book="{}" submit-button-text="Add Book" @submit="saveBook" />
</template>

<script>
import axios from 'axios'
import BookForm from '../../components/BookForm.vue'
import { useToast } from 'vue-toastification';
export default {
  name: 'AddBook',
  components: {
    BookForm
  },
  setup(){
    const toast = useToast()
    return{
      toast
    }
  },
  methods: {
    async saveBook(formData) {
      const url = "http://127.0.0.1:8000/api/save_book";

      const response = await axios.post(url, formData);
      if (response.status === 200) {
        this.toast.success(response.data.message, {
          timeout: 1200
        });
        this.$router.push('/admin/books');
      }

    }
  }
}
</script>