<template>
    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div
            class="bg-white dark:bg-gray-900 shadow-2xl shadow-brand-tan/10 rounded-[2.5rem] w-full max-w-md p-10 border border-brand-cream/50 dark:border-gray-800 text-center">

            <div class="mb-10">
                <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-3">
                    Verification
                </h2>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest leading-relaxed">
                    Enter the 6-digit code sent to <br> your secure device
                </p>
            </div>

            <form @submit.prevent="submitForm">

                <div class="flex justify-between gap-2 mb-10">

                    <input v-for="(digit, index) in otp" :key="index" v-model="otp[index]" type="text" maxlength="1"
                        class="w-12 h-14 bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl text-center text-xl font-black text-brand-tan focus:ring-2 focus:ring-brand-tan" />

                    <!--input v-for="(digit, index) in otp" :key="index" v-model="otp[index]" type="text" maxlength="1"
                        class="w-12 h-14 bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl text-center text-xl font-black text-brand-tan focus:ring-2 focus:ring-brand-tan transition-all duration-300" /-->

                </div>

                <p v-if="errors" class="text-red-500 text-sm">
                    {{ errors }}
                </p>


                <button
                    class="w-full bg-brand-tan text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                    Verify Account
                </button>
            </form>

            <div class="mt-10 space-y-4">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Didn't receive the code?
                    <button
                        class="text-brand-tan hover:opacity-80 transition-opacity ml-1 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                        Resend
                    </button>
                </p>

                <div
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-cream/10 dark:bg-gray-800 border border-brand-cream/30 dark:border-gray-700">
                    <div class="w-1.5 h-1.5 rounded-full bg-brand-tan animate-pulse"></div>
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">
                        Resend available in 30s
                    </span>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-brand-cream/30 dark:border-gray-800">
                <router-link to="/login"
                    class="group text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-brand-tan transition-colors">
                    <span class="inline-block mr-1 group-hover:-translate-x-1 transition-transform">←</span>
                    Back to Secure Sign In
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

const otp = ref(['', '', '', '', '', ''])

const errors = ref("")

const success = ref("")

const submitForm = async () => {

    const otpCode = otp.value.join('')

    try {

        const response = await api.post('/verify-otp', {
            email: router.currentRoute.value.query.email,
            otp: otpCode
        })

        //console.log(response)

        if (response.status === 200) {

            success.value = response.data.message

        }

    } catch (error) {

        //console.log(error.response.status)

        errors.value = error.response.data.message

    }

}
</script>
