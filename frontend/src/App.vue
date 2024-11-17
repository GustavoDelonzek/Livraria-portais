<script setup>
import { useRoute } from 'vue-router'
import { ref, watchEffect } from 'vue' 
import Header from '@/components/Header.vue'
import { RouterView } from 'vue-router'




const route = useRoute()
const isLoginPage = ref(false)
const isRegisterPage = ref(false)

watchEffect(() => {
  isLoginPage.value = route.path === '/login'
  isRegisterPage.value = route.path === '/register'
})
</script>

<template>
  <Header v-if="!isLoginPage && !isRegisterPage" />
  <RouterView />
  <p v-if="!route.path">Conteúdo do RouterView não está sendo renderizado</p>
</template>

<style scoped>
</style>
