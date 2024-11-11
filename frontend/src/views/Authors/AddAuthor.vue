<template>
  <AuthorForm :initial-author="{}" submit-button-text="Add Author" @submit="saveAuthor" />
</template>

<script>
import axios from 'axios';
import AuthorForm from '../../components/AuthorForm.vue';

export default {
  name: 'AddAuthor',
  components: {
    AuthorForm
  },
  data() {
    return {
      errors: []
    };
  },
  methods: {
    async saveAuthor(formData) {
      const url = "http://127.0.0.1:8000/api/save_author";
      
        const response = await axios.post(url, formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          }
        });

        if (response.status === 200) {
          alert(response.data.message);
          this.errors = [];
        }
      
      
    }
  }
};
</script>
