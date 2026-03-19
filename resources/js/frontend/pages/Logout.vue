<template>
    <div class="min-h-screen flex items-center justify-center bg-[#f6eee3] px-4 font-sans">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-10 text-center border border-[#d9bda5]/20">
            <div class="mb-6 flex justify-center">
                <div class="w-16 h-16 bg-[#f6eee3] rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#d9bda5]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-gray-800 mb-2">Logout</h1>
            <p class="text-gray-500 mb-8 leading-relaxed">
                Are you sure you want to log out? <br>
                We'd love to see you again soon.
            </p>

            <div class="grid grid-cols-2 gap-4">
                <button @click="cancelLogout"
                    class="px-6 py-3 rounded-xl border-2 border-[#d9bda5] text-[#d9bda5] font-semibold hover:bg-[#f6eee3] transition-all duration-300">
                    Keep me in
                </button>

                <button @click="handleLogout"
                    class="px-6 py-3 rounded-xl bg-[#d9bda5] text-white font-semibold hover:bg-[#c8a98d] shadow-lg shadow-[#d9bda5]/30 transition-all duration-300 transform hover:-translate-y-0.5">
                    Yes, Logout
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router'
import { useUserStore } from '../stores/user';
import api from '../services/api';

const router = useRouter()
const userStore = useUserStore()

const handleLogout = () => {
    // Clear user session from store and localStorage
    userStore.logout()

    // Redirect to login page
    router.push('/login')
}

const cancelLogout = () => {
    router.push('/')
}
</script>