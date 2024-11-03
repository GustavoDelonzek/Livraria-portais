<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>


<style scoped>

</style>

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
</template>