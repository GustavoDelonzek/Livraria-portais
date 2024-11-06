<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { onMounted } from 'vue'
import { 
    initAccordions, 
    initCarousels, 
    initCollapses, 
    initDials, 
    initDismisses, 
    initDrawers, 
    initDropdowns, 
    initModals, 
    initPopovers, 
    initTabs, 
    initTooltips } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initAccordions();
    initCarousels();
    initCollapses();
    initDials();
    initDismisses();
    initDrawers();
    initDropdowns();
    initModals();
    initPopovers();
    initTabs();
    initTooltips();
})


</script>



<style scoped></style>

<script>
import Header from './components/Header.vue'
import SideBar from './components/SideBar.vue'
export default {
  name: 'App',
  components: {
    Header, 
    SideBar
  }
}
</script>

<template>
 
  <div class="flex h-screen">
    
    <SideBar class="w-64 bg-gray-800 text-white fixed h-full"/>
    
    <div class="flex-1 flex flex-col ml-64">
      
    
      <main class="p-4 pt-20">
        <RouterView />
      </main>
      
    </div>
  </div>
  
</template>
