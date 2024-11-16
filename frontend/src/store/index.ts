// src/store/index.ts

import { createStore } from 'vuex';
import axios from 'axios';

// Definindo a interface para o estado
interface State {
    user: null | { name: string; email: string; role: string };
}

// Criando o store
const store = createStore<State>({
    state: {
        user: null,
    },
    mutations: {
        setUser (state, userData) {
            state.user = userData;
        },
        logout(state) {
            localStorage.removeItem('token');
            localStorage.removeItem('role');
            state.user = null;
        },
    },
    actions: {
        async login({ commit }, credentials) {
            try {
                const response = await axios.post('/api/login', credentials);
                commit('setUser ', response.data.user);
                localStorage.setItem('token', response.data.token);
                localStorage.setItem('role', response.data.role);
            } catch (error) {
                console.error('Login failed:', error);
                throw error;
            }
        },
        async checkAuth({ commit }) {
            const token = localStorage.getItem('token');
            if (token) {
                try {
                    const response = await axios.get('/api/user', {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });
                    commit('setUser ', response.data);
                } catch (error) {
                    console.error('Token inválido ou expirado:', error);
                    commit('logout');
                }
            }
        },
    },
});

export default store;