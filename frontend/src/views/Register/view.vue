<template>
    <section class="bg-gray-100 min-h-screen flex items-center justify-center">
      <div class="bg-gray-100 flex rounded-2xl max-h-screen shadow-lg max-w-4xl w-full p-5 items-center">
        <div class="md:block hidden w-1/2">
          <img class="rounded-2xl w-full h-full object-cover" src="https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb">
        </div>
        <div class="md:w-1/2 px-8 md:px-16 w-full">
          <h2 class="font-bold text-2xl text-[#002D74]">Registro</h2>
          <p class="text-xs mt-4 text-[#002D74]">Crie sua conta para começar a explorar nossa livraria</p>
  
          <form class="flex flex-col gap-4" @submit.prevent="submit">
            <input class="p-2 mt-8 rounded-xl border" placeholder="Nome" v-model="data.name" type="text" required>
            <hr class="border-t-2 border-gray-400 "/>
            <input class="p-2 mt-4 rounded-xl border" placeholder="Email" v-model="data.email" type="email" required>
            <div class="relative">
              <input class="p-2 rounded-xl border w-full" placeholder="Senha" v-model="data.password" type="password" required>
            </div>
            <div class="relative">
              <input class="p-2 rounded-xl border w-full" placeholder="Confirme sua senha" v-model="data.password_confirmation" type="password" required>
            </div>
            
            <button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Cadastrar</button>
          </form>
          <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
            
            <p>Já tem uma conta?</p>
            <RouterLink to="/login" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Entrar</RouterLink>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script lang="ts">
  import { reactive } from 'vue';
  import { useRouter } from 'vue-router';
  
  export default {
    name: "Register",
    setup() {
        const data = reactive({
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        })
        const router = useRouter();
        const submit = async () => {
            await fetch('http://localhost:8000/api/register', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
            });
            await router.push('/login');
        }
        
        return {
            data,
            submit
        }
        }
    }
</script>