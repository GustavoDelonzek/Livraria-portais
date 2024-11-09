<template>
    <div>
        <h2>Registro</h2>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Nome:</label>
                <input type="text" v-model="data.name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" v-model="data.email" type="email" required>
            </div>

            <div>
                <label for="password">Senha:</label>
                <input id="password" v-model="data.password" type="password" required>
            </div>
            <div>
                <label for="password">Confirme sua senha:</label>
                <input id="password_confirmation" v-model="data.password_confirmation" type="password" required>
            </div>

            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
import {reactive} from 'vue';
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
            await fetch('http://127.0.0.1:8000/api/register', {
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