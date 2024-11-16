import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useAuthStore = defineStore('auth', {
  token: ref(localStorage.getItem('token')),
  user: ref(JSON.parse(localStorage.getItem('user'))),

  setToken: function(tokenValue) {
    localStorage.setItem('token', tokenValue)
  },
  setUser: function(userValue) {
    localStorage.setItem('user', userValue)
    user.value = userValue
  },
    setToken,
    setUser

})