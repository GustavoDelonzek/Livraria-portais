<template>
    <div>
      <h2>Login</h2>
      <form @submit.prevent="login">
        <div>
          <label for="email">Email:</label>
          <input id="email" v-model="email" type="email" required>
        </div>
  
        <div>
          <label for="password">Senha:</label>
          <input id="password" v-model="password" type="password" required>
        </div>
  
        <div>
          <button type="submit">Entrar</button>
        </div>
      </form>
      <div>
        <b-modal id="modal-credenciais-invalidas" title="Credenciais Invalidas" ok-only>
            <p>{{ mensagemErro }}</p>
        </b-modal>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: '',
        password: '',
      };
    },
    methods: {
      login() {
        const credentials = {
          email: this.email,
          password: this.password,
        };
         let url = `http://127.0.0.1:8000/api/login`;
        axios.post(url, credentials)
          .then((response) => {
          if (response.data.code == 200) {
              this.$router.push({ name: 'adminHome' });
          } else {
            this.mensagemErro = 'Credenciais Invalidas';
            this.$bvModal.show('modal-credenciais-invalidas');
          }
          })
          .catch((error) => {
            // Autenticação falhou
            console.error(error);
          });
      },
    },
  };
  </script>