import { defineStore } from 'pinia'
import { onMounted } from 'vue'
import api from '../services/api';


export const useUserStore = defineStore('user', {
    
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
        //country_id: localStorage.getItem('country_id') || null,
        country_name: localStorage.getItem('country_name') || null,
    }),

    actions: {

        setUser(userData) {

            //console.log('User data:', userData)
            this.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
            localStorage.setItem('country_name', userData.country_name)

        },

        setToken(token) {
    
            //console.log('User token:', token)
            this.token = token
            localStorage.setItem('token', token)

        },

        logout() {

            this.user = null
            this.token = null
            localStorage.removeItem('user')
            localStorage.removeItem('token')
        
        },

        /*
        async fetchUser() {
            console.log('#####Fetching user...');
            try {

                console.log('#####Fetching user#1...'+this.token);

                const response = await api.get('/user', {
                    headers: {
                        Authorization: `Bearer ${this.token}`
                    }
                })

                //console.log('#####Fetching user#2...'+response);
                //console.log('User fetched successfully#3...', response.data.data)
                //console.log(JSON.stringify(response));

                this.user = response.data.data.user
                this.token = response.data.data.token
                localStorage.setItem('user', JSON.stringify(response.data.data.user))
                localStorage.setItem('token', response.data.data.token)

            } catch (error) {
                
                console.error('Fetch user failed:', error)

                // Optional: logout if token invalid
                this.user = null
                this.token = null
                localStorage.removeItem('token') 
                localStorage.removeItem('user')
            }

        }
            */

    },
    persist: true
})

/*onMounted(async () => {

   
})*/