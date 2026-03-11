<template>
    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div
            class="bg-white dark:bg-gray-900 shadow-2xl shadow-brand-tan/10 rounded-[2.5rem] w-full max-w-md p-10 border border-brand-cream/50 dark:border-gray-800">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">
                    Create Account
                </h2>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Start your premium journey
                </p>
            </div>

            <form class="space-y-5" @submit.prevent="submitForm">

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Full Name</label>
                    <input v-model="form.name" id="name" type="text" placeholder="John Doe"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-3.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">
                    <!--p v-if="errors.name" class="text-red-500 text-sm">
                        {{ errors.name[0] }}
                    </p-->
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Email
                        Address</label>
                    <input v-model="form.email" id="email" type="email" placeholder="john@example.com"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-3.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">
                    <!--p v-if="errors.email" class="text-red-500 text-sm">
                        {{ errors.email[0] }}
                    </p-->
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Password</label>
                    <input v-model="form.password" id="password" type="password" placeholder="••••••••"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-3.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">
                    <!--p v-if="errors.password" class="text-red-500 text-sm">
                        {{ errors.password[0] }}
                    </p-->
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Confirm
                        Password</label>
                    <input v-model="form.password_confirmation" id="password_confirmation" type="password"
                        placeholder="••••••••"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-3.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">
                </div>

                <button :disabled="loading"
                    class="w-full bg-brand-tan text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-300 mt-4">
                    {{ loading ? 'Registering...' : 'Register' }}
                </button>

            </form>

            <div class="flex items-center my-8">
                <div class="flex-grow border-t border-brand-cream/30 dark:border-gray-800"></div>
                <span class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">or Join with</span>
                <div class="flex-grow border-t border-brand-cream/30 dark:border-gray-800"></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button
                    class="flex items-center justify-center gap-2 py-3 border border-brand-cream/50 dark:border-gray-800 rounded-2xl hover:bg-brand-cream/10 dark:hover:bg-gray-800 transition-all group">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12.48 10.92v3.28h7.84c-.24 1.84-.92 3.36-2.08 4.48-1.52 1.52-3.84 3.08-7.84 3.08-6.16 0-11-4.84-11-11s5.28-11 11.44-11c3.16 0 5.48 1.16 7.16 2.76l2.36-2.36c-2.48-2.44-5.6-3.8-9.48-3.8-7.56 0-14.12 5.24-14.12 14.12s6.56 14.12 14.12 14.12c4.08 0 7.16-1.32 9.52-3.68 2.44-2.44 3.12-5.88 3.12-8.56 0-.6-.04-1.2-.12-1.76h-12.52z" />
                    </svg>
                    <span class="text-xs font-bold text-gray-600 dark:text-gray-300">Google</span>
                </button>

                <button
                    class="flex items-center justify-center gap-2 py-3 border border-brand-cream/50 dark:border-gray-800 rounded-2xl hover:bg-brand-cream/10 dark:hover:bg-gray-800 transition-all group">
                    <svg class="h-5 w-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                    <span class="text-xs font-bold text-gray-600 dark:text-gray-300">Facebook</span>
                </button>
            </div>

            <p class="text-center text-xs font-bold text-gray-400 mt-10">
                Already have an account?
                <!--a href="#" class="text-brand-tan hover:opacity-80 transition-opacity ml-1">Sign In</a-->
                <router-link to="/login" class="text-brand-tan hover:opacity-80 transition-opacity ml-1">Sign
                    In</router-link>
            </p>

        </div>
    </div>
</template>

<script setup>

import { reactive, ref } from 'vue';
import api from '../services/api';

const loading = ref(false);
const form = reactive({
    name: '',
    email: '',
    password: '',
});

const submitForm = async () => {

    errors.value = {}

    try {

        loading.value = true

        const response = await api.post("/register", form)

        console.log(response.data)

    } catch (error) {

        console.log(error.response.status);

        if (error.response.status === 422) {

            errors.value = error.response.data.errors

        }

    } finally {

        loading.value = false

    }

}

</script>
