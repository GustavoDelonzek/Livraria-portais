<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { onMounted } from 'vue'



</script>



<style scoped></style>

<script>
import Header from './components/Header.vue'
export default {
  name: 'App',
  components: {
      Header
  }
}
</script>

<template>
  <Header></Header>
    <RouterView/>
</template>
