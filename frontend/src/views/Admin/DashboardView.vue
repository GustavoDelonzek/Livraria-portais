
<script lang="ts">
import SideBar from '@/components/SideBar.vue'
import { onMounted } from 'vue';
import { RouterLink, RouterView } from 'vue-router'
export default {
  name: 'DashboardView',
  components: {
    SideBar
  },

  setup() {
    onMounted( async ()=>{
    await fetch('http://127.0.0.1:8000/api/user', {
          headers: { 'Content-Type': 'application/json' },
          credentials: 'include'
        });
  })
  }
}
</script>

<template>

  <div class="flex h-screen">

    <SideBar class="w-64 bg-gray-800 text-white fixed h-full" />

    <div class="flex-1 flex flex-col ml-64">


      <main class="p-4 pt-20">
        <RouterView />
      </main>
      <form @submit.prevent="">
        <button type="submit">Logout</button>
      </form>
    </div>
  </div>

</template>