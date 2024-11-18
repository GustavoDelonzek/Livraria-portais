<script setup>
import { useRoute } from 'vue-router'
import { ref, watchEffect } from 'vue' 
import Header from '@/components/Header.vue'
import { RouterView } from 'vue-router'




const route = useRoute()
const isLoginPage = ref(false)
const isRegisterPage = ref(false)

const isAdminRoute = ref(false)

watchEffect(() => {
  isLoginPage.value = route.path === '/login'
  isRegisterPage.value = route.path === '/register'
  isAdminRoute.value = route.path.startsWith('/admin') 
})
</script>

<template>
  <Header v-if="!isLoginPage && !isRegisterPage  && !isAdminRoute" />
  <RouterView />
  <p v-if="!route.path">Conteúdo do RouterView não está sendo renderizado</p>
</template>

<style scoped>
</style>
