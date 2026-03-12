<template>
    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div
            class="bg-white dark:bg-gray-900 shadow-2xl shadow-brand-tan/10 rounded-[2.5rem] w-full max-w-md p-10 border border-brand-cream/50 dark:border-gray-800">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-3">
                    Recovery
                </h2>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest leading-relaxed">
                    Enter your email for the <br> premium reset link
                </p>
            </div>

            <form class="space-y-6" @submit.prevent="submitForm">

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Email
                        Address</label>
                    <input type="email" placeholder="verify@example.com" v-model="email"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">

                    <p v-if="errors" class="text-red-500 text-sm">
                        {{ errors }}
                    </p>

                </div>

                <button
                    class="w-full bg-brand-tan text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer">
                    Send Link
                </button>

            </form>

            <div class="mt-10 text-center">

                <!--a href="#"
                    class="group text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-brand-tan transition-colors">
                    <span class="inline-block mr-1 group-hover:-translate-x-1 transition-transform">←</span>
                    Back to Secure Sign In
                </a-->

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
import { ref } from 'vue';
import { useRouter } from 'vue-router'
import api from '../services/api';

const router = useRouter()

const email = ref('');
const success = ref("")

const errors = ref('')

const submitForm = async () => {

    try {

        const response = await api.post('/verify-email', {
            email: email.value
        })

        console.log('whatsapp' + response)

        if (response.status === 200) {

            success.value = response.data.message

            const otpResponse = await api.post("/send-otp", {
                email: email.value
            })


            if (otpResponse.status === 200) {

                router.push({
                    path: '/otp-verify',
                    query: {
                        email: email.value,
                        type: 'reset-password'
                    }
                })

            }

        }

    } catch (error) {

        if (error.response.status === 422) {

            errors.value = error.response.data.message

        }

    }

};

</script>
