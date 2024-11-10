<template >
  <section class="bg-gray-100 min-h-screen  flex items-center justify-center ">
    <div class="bg-gray-100 flex rounded-2xl max-h-screen shadow-lg max-w-4xl w-full p-5  items-center">
      
      <div class="md:w-1/2 px-8 md:px-16 w-full">
        <h2 class="font-bold text-2xl text-[#002D74]">Login</h2>
        <p class="text-xs mt-4 text-[#002D74]">Bem vindo de volta à nossa livraria</p>

        <form class="flex flex-col gap-4" @submit.prevent="submit">
          <input class="p-2 mt-8 rounded-xl border" placeholder="Email" id="email" v-model="data.email" type="email" required>
          <div class="relative">
            <input class="p-2 rounded-xl border w-full" id="password" v-model="data.password" type="password" required placeholder="Password">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
          </div>
          <button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Entrar</button>
        </form>

        

        <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
          <p>Não possui uma conta?</p>
          <RouterLink to="/register" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Registrar-se</RouterLink>
        </div>
      </div>
      <div class="md:block hidden w-1/2">
        <img class="rounded-2xl w-full h-full object-cover" src="https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb">
      </div>
    </div>
  </section>
</template>



<script lang="ts">
import { reactive } from 'vue';
import { useRouter } from 'vue-router';

export default {
  name: "Login",
  setup() {
    const data = reactive({
      email: '',
      password: '',
    })
    const router = useRouter();
    const submit = async () => {
      try {
        await fetch('http://127.0.0.1:8000/api/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          credentials: 'include',
          body: JSON.stringify(data)
        });
        await router.push('/admin/home');
      } catch (error) {
        console.error('Error logging in:',JSON.stringify(data), error);
      }
    }

    return {
      data,
      submit
    }
  }
}



</script>