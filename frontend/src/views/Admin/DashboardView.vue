
<script lang="ts">
import SideBar from '@/components/SideBar.vue';


export default {
  name: 'DashboardView',
  components: {
    SideBar
  }
}
</script>

<template>

  <div class="flex h-screen" >

    <SideBar class="w-64 bg-gray-800 text-white fixed h-full" />

    <div class="flex-1 flex flex-col ml-64">


      <main class="p-4">
        <RouterView />
      </main>

    </div>
  </div>

</template>