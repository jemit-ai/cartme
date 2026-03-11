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

            <form class="space-y-6">

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Email
                        Address</label>
                    <input type="email" placeholder="verify@example.com"
                        class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-brand-tan transition-all duration-300">
                </div>

                <button
                    class="w-full bg-brand-tan text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-300">
                    Send Link
                </button>

            </form>

            <div class="mt-10 text-center">
                <a href="#"
                    class="group text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-brand-tan transition-colors">
                    <span class="inline-block mr-1 group-hover:-translate-x-1 transition-transform">←</span>
                    Back to Secure Sign In
                </a>
            </div>

        </div>
    </div>
</template>
