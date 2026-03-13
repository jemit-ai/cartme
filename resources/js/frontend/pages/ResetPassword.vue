<template>
    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div
            class="bg-white dark:bg-gray-900 shadow-2xl shadow-brand-tan/10 rounded-[2.5rem] w-full max-w-md p-10 border border-brand-cream/50 dark:border-gray-800">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">
                    Reset Password
                </h2>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Create a secure new password
                </p>
            </div>

            <form class="space-y-5" @submit.prevent="submitForm">

                <!-- Email -->
                <!--div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">
                        Email Address
                    </label>
                    <input type="email" readonly
                        class="w-full bg-brand-cream/5 dark:bg-gray-800/50 border-none rounded-2xl px-5 py-3.5 text-sm text-gray-500 cursor-not-allowed">
                </div-->

                <!-- New Password -->

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">
                        New Password
                    </label>
                    <input id="password" v-model="password" type="password" placeholder="••••••••"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-3.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">
                    <p v-if="errors.password" class="text-red-500 text-sm">
                        {{ errors.password[0] }}
                    </p>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">
                        Confirm Password
                    </label>
                    <input id="password_confirmation" v-model="password_confirmation" type="password"
                        placeholder="••••••••"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-3.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">

                </div>

                <!-- Success Message -->
                <div v-if="success"
                    class="bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 p-4 rounded-2xl">
                    <p
                        class="text-green-600 dark:text-green-400 text-xs font-bold text-center uppercase tracking-widest">
                        {{ success }}
                    </p>
                </div>

                <button :disabled="loading"
                    class="w-full bg-brand-tan text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-300 mt-4 disabled:opacity-50 disabled:cursor-not-allowed">
                    {{ loading ? 'Updating...' : 'Update Password' }}
                </button>

            </form>

            <div class="text-center mt-10">
                <router-link to="/login"
                    class="text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-brand-tan transition-colors">
                    Back to Sign In
                </router-link>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import api from '../services/api';

const router = useRouter()

const password = ref('')
const password_confirmation = ref('')

const errors = ref({});
const success = ref('');
const loading = ref(false)

const submitForm = async () => {
    errors.value = {}
    loading.value = true;
    success.value = '';

    const email = sessionStorage.getItem("register_email");

    try {
        const response = await api.post('/reset-password', {
            email: email,
            password: password.value,
            password_confirmation: password_confirmation.value,
        })

        if (response.status === 200) {
            success.value = response.data.message || 'Password updated successfully';
            sessionStorage.removeItem("register_email");

        }
    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors;
        } else {
            console.error('Reset password error:', error);
            errors.value = { general: 'Something went wrong. Please try again.' };
        }
    } finally {
        loading.value = false;
    }
}
</script>
