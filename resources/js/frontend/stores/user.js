import { defineStore } from 'pinia'
import { onMounted } from 'vue'
import api from '../services/api';


export const useUserStore = defineStore('user', {
    
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
    }),
    actions: {

        setUser(userData) {
            this.user = userData
        },

        setToken(token) {
            this.token = token
        },

        logout() {
            this.user = null
            this.token = null
        },

        async fetchUser() {

            try {

                const response = await api.get('/api/user', {
                    headers: {
                        Authorization: `Bearer ${this.token}`
                    }
                })

                this.user = response.data
                console.log('User fetched successfully:', response.data)
            } catch (error) {
                
                console.error('Fetch user failed:', error)

                // Optional: logout if token invalid
                this.user = null
                this.token = null
                localStorage.removeItem('token')
            }
        }

    },
    persist: true
})

/*onMounted(async () => {

   
})*/