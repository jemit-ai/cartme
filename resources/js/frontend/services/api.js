import axios from 'axios'

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    },
    withCredentials: true
})

// Add a request interceptor to attach token
api.interceptors.request.use((config) => {

    const token = localStorage.getItem('token')
    const guest_token = localStorage.getItem('guest_token')

    
    if (token) {
        config.headers.Authorization = `Bearer ${token}`
    }

    if (guest_token) {
        config.headers['X-Guest-Token'] = guest_token;
    } 

    return config
}, (error) => {
    return Promise.reject(error)
})



// Add a response interceptor for error handling
api.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            // Token expired or invalid - redirect to login
            localStorage.removeItem('auth_token')
            //localStorage.removeItem('auth_token')

            window.location.href = '/login'
        }
        return Promise.reject(error)
    }
)

export default api
