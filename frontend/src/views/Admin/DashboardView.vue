
<script lang="ts">
import SideBar from '@/components/SideBar.vue';
import { onMounted, ref} from 'vue';

import { RouterLink, RouterView } from 'vue-router'
export default {
  name: 'DashboardView',
  components: {
    SideBar
  },

  setup() {
    const message = ref('Permissão negada! Você não está logado.');
    const trava = ref(false);
    const mensagemErro = ref('');
    onMounted( async ()=>{
      try {
        const response = await fetch('http://localhost:8000/api/user', {
          headers: { 'Content-Type': 'application/json' },
          credentials: 'include'
        });
        if(response.status === 500){
          trava.value = true;
        }
      }catch (error) {
        mensagemErro.value = 'erro ao entrar em contato com a api'
      }
    

  });
    return {
      message,
      trava
    }
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