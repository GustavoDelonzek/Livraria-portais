<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="submit">
      <div>
        <label for="email">Email:</label>
        <input id="email" v-model="data.email" type="email" required>
      </div>

      <div>
        <label for="password">Senha:</label>
        <input id="password" v-model="data.password" type="password" required>
      </div>

      <div>
        <button type="submit">Entrar</button>
      </div>
    </form>
  </div>
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
        await fetch('http://localhost:8000/api/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          credentials: 'include',
          body: JSON.stringify(data)
        });
        await router.push('/admin/home');
      } catch (error) {
        console.error('Error logging in:', error);
      }
    }

    return {
      data,
      submit
    }
  }
}



</script>