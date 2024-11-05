<template>
    <PublisherForm v-if="publisher.id" :initial-publisher="publisher" submit-button-text="Update Publisher" @submit="updatePublisher" />
  </template>
  
  <script>
  import axios from 'axios'
  import PublisherForm from '../../components/PublisherForm.vue'
  
  export default {
    name: 'EditPublisher',
    components: {
      PublisherForm
    },
    data() {
      return {
        publisher: {}
      }
    },
    created() {
      this.getPublisherById()
    },
    methods: {
      async getPublisherById() {
        const url = `http://127.0.0.1:8000/api/get_publisher/${this.$route.params.id}`
        try {
          const response = await axios.get(url)
          this.publisher = response.data
        } catch (error) {
          console.log(error)
        }
      },
      async updatePublisher(publisher) {
        const url = `http://127.0.0.1:8000/api/update_publisher/${this.$route.params.id}`
        try {
          const response = await axios.post(url, publisher)
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
  