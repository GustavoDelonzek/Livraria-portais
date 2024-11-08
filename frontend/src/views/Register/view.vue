<template>
    <div>
        <h2>Registro</h2>
        <form @submit.prevent="Register">
            <div>
                <label for="name">Nome:</label>
                <input type="text" v-model="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" v-model="email" type="email" required>
            </div>

            <div>
                <label for="password">Senha:</label>
                <input id="password" v-model="password" type="password" required>
            </div>
            <div>
                <label for="password">Confirme sua senha:</label>
                <input id="password2" v-model="password" type="password" required>
            </div>

            <div>
                <button type="submit">Entrar</button>
            </div>
        </form>
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
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password2,

            };
            let url = `http://127.0.0.1:8000/api/register`;
            axios.post(url, credentials)
                .then((response) => {
                    // Autenticação bem-sucedida
                    this.$router.push({ name: 'login' });
                    
                })
                .catch((error) => {
                    // Autenticação falhou
                    console.error(error);
                });
        },
    },
};
</script>