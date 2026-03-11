<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 tracking-tight">Shopping Bag</h1>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- CART ITEMS -->
            <div class="lg:col-span-2 space-y-6">

                <!-- ITEM -->
                <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 flex flex-col sm:flex-row items-center gap-6 transition-all hover:shadow-md">

                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9"
                            class="w-32 h-32 rounded-xl object-cover shadow-sm group-hover:scale-105 transition-transform duration-300">
                    </div>

                    <div class="flex-1 text-center sm:text-left">

                        <h3 class="font-bold text-xl text-gray-800 dark:text-white">
                            Smart Phone
                        </h3>

                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
                            128GB | Midnight Black
                        </p>

                        <div class="flex items-center justify-center sm:justify-start gap-6 mt-4">

                            <div class="flex items-center bg-brand-cream/20 dark:bg-gray-800 rounded-lg p-1 border border-brand-cream/30">
                                <button class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-300">-</button>
                                <span class="px-4 font-bold text-sm">1</span>
                                <button class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-300">+</button>
                            </div>

                            <button class="text-red-400 hover:text-red-600 dark:hover:text-red-500 text-xs font-bold uppercase tracking-wider transition-colors">
                                Remove
                            </button>

                        </div>

                    </div>

                    <div class="sm:text-right">
                        <p class="text-2xl font-black text-brand-tan">
                            $499
                        </p>
                    </div>

                </div>

                <!-- ITEM -->
                <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 flex flex-col sm:flex-row items-center gap-6 transition-all hover:shadow-md">

                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                            class="w-32 h-32 rounded-xl object-cover shadow-sm group-hover:scale-105 transition-transform duration-300">
                    </div>

                    <div class="flex-1 text-center sm:text-left">

                        <h3 class="font-bold text-xl text-gray-800 dark:text-white">
                            Smart Watch
                        </h3>

                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
                            Series 7 | Starlight
                        </p>

                        <div class="flex items-center justify-center sm:justify-start gap-6 mt-4">

                            <div class="flex items-center bg-brand-cream/20 dark:bg-gray-800 rounded-lg p-1 border border-brand-cream/30">
                                <button class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-300">-</button>
                                <span class="px-4 font-bold text-sm">2</span>
                                <button class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-300">+</button>
                            </div>

                            <button class="text-red-400 hover:text-red-600 dark:hover:text-red-500 text-xs font-bold uppercase tracking-wider transition-colors">
                                Remove
                            </button>

                        </div>

                    </div>

                    <div class="sm:text-right">
                        <p class="text-2xl font-black text-brand-tan">
                            $199
                        </p>
                    </div>

                </div>

            </div>

            <!-- ORDER SUMMARY -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 h-fit sticky top-24">

                <h2 class="text-xl font-extrabold text-gray-900 dark:text-white mb-8 tracking-tight">
                    Order Summary
                </h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Subtotal</span>
                        <span class="font-bold text-gray-900 dark:text-white">$897</span>
                    </div>

                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Shipping</span>
                        <span class="font-bold text-green-500 uppercase text-xs">Free</span>
                    </div>

                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Est. Tax</span>
                        <span class="font-bold text-gray-900 dark:text-white">$15</span>
                    </div>

                    <div class="pt-4 mt-4 border-t border-brand-cream/30 dark:border-gray-800">
                        <div class="flex justify-between items-baseline text-gray-900 dark:text-white">
                            <span class="text-base font-bold">Total Amount</span>
                            <span class="text-3xl font-black text-brand-tan">$912</span>
                        </div>
                    </div>

                </div>

                <!-- COUPON -->
                <div class="mt-8">
                    <div class="flex gap-2">
                        <input type="text" placeholder="Promo code" 
                            class="flex-1 bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-tan">
                        <button class="px-4 py-2.5 rounded-xl border border-brand-tan/30 text-brand-tan font-bold text-xs uppercase hover:bg-brand-cream/20 transition-all">
                            Apply
                        </button>
                    </div>
                </div>

                <button class="mt-8 w-full bg-brand-tan text-white py-4 rounded-xl font-bold text-sm tracking-widest uppercase shadow-lg shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-200">
                    Checkout Now
                </button>

                <div class="mt-6 flex items-center justify-center gap-2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <span class="text-[10px] font-bold uppercase tracking-widest">SSL Encrypted Secure Payment</span>
                </div>

            </div>

        </div>

    </div>
</template>