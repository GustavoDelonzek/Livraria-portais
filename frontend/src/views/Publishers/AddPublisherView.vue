<template>
  <PublisherForm :initial-publisher="{}" submit-button-text="Add Publisher" @submit="savePublisher" />
</template>

<script>
import axios from 'axios'
import PublisherForm from '../../components/PublisherForm.vue'
import { useToast } from 'vue-toastification';
export default {
  name: 'AddPublisher',
  components: {
    PublisherForm
  },

  setup() {
    const toast = useToast();

    return {
      toast
    }
  },
  methods: {
    async savePublisher(publisher) {
      const url = "http://127.0.0.1:8000/api/save_publisher"
      try {
        const response = await axios.post(url, publisher)
        if (response.status === 200) {
          this.toast.success(response.data.message, {
            timeout: 1300
          })
        }
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>