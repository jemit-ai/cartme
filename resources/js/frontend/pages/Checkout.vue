<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-10 tracking-tight">Checkout</h1>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- LEFT SIDE -->
            <div class="lg:col-span-2 space-y-10">

                <!-- SHIPPING ADDRESS -->
                <div
                    class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800">

                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-8 tracking-tight">
                        Shipping Details
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">First
                                Name</label>
                            <input type="text" placeholder="John"
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">Last
                                Name</label>
                            <input type="text" placeholder="Doe"
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">Email
                                Address</label>
                            <input type="email" placeholder="john@example.com"
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">Phone
                                Number</label>
                            <input type="text" placeholder="+1 (555) 000-0000"
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">Delivery
                                Address</label>
                            <input type="text" placeholder="Street address, apartment, suite, etc."
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">City</label>
                            <input type="text" placeholder="City"
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">Postal
                                Code</label>
                            <input type="text" placeholder="00000"
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all">
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label
                                class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-1">Country</label>
                            <div class="relative">
                                <select
                                    class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-brand-tan transition-all appearance-none">
                                    <option>Select Country</option>
                                    <option>India</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- PAYMENT METHOD -->
                <div
                    class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800">

                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-8 tracking-tight">
                        Payment Method
                    </h2>

                    <div class="space-y-4">

                        <label
                            class="flex items-center p-4 bg-brand-cream/5 dark:bg-gray-800/50 rounded-xl border border-brand-cream/30 dark:border-gray-800 cursor-pointer group hover:border-brand-tan transition-all">
                            <input type="radio" name="payment" class="w-4 h-4 text-brand-tan focus:ring-brand-tan">
                            <span class="ml-4 font-bold text-sm text-gray-700 dark:text-gray-200">Credit / Debit
                                Card</span>
                            <div class="ml-auto flex gap-2">
                                <div class="w-8 h-5 bg-gray-200 dark:bg-gray-700 rounded-sm"></div>
                                <div class="w-8 h-5 bg-gray-200 dark:bg-gray-700 rounded-sm"></div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 bg-brand-cream/5 dark:bg-gray-800/50 rounded-xl border border-brand-cream/30 dark:border-gray-800 cursor-pointer group hover:border-brand-tan transition-all">
                            <input type="radio" name="payment" class="w-4 h-4 text-brand-tan focus:ring-brand-tan">
                            <span class="ml-4 font-bold text-sm text-gray-700 dark:text-gray-200">Pay with UPI</span>
                            <span class="ml-auto text-[10px] font-black uppercase text-brand-tan">Instant</span>
                        </label>

                        <label
                            class="flex items-center p-4 bg-brand-cream/5 dark:bg-gray-800/50 rounded-xl border border-brand-cream/30 dark:border-gray-800 cursor-pointer group hover:border-brand-tan transition-all">
                            <input type="radio" name="payment" class="w-4 h-4 text-brand-tan focus:ring-brand-tan">
                            <span class="ml-4 font-bold text-sm text-gray-700 dark:text-gray-200">Cash on
                                Delivery</span>
                        </label>

                    </div>

                </div>

            </div>

            <!-- ORDER SUMMARY -->
            <div
                class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 h-fit sticky top-24">

                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-8 tracking-tight">
                    Review Order
                </h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Smartphone X <span class="text-[10px] font-bold">x1</span></span>
                        <span class="font-bold text-gray-900 dark:text-white">$499</span>
                    </div>

                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Elegance Watch <span class="text-[10px] font-bold">x1</span></span>
                        <span class="font-bold text-gray-900 dark:text-white">$199</span>
                    </div>

                    <div class="pt-6 mt-6 border-t border-brand-cream/30 dark:border-gray-800 space-y-3">
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Subtotal</span>
                            <span class="font-bold text-gray-900 dark:text-white">$698</span>
                        </div>

                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Shipping</span>
                            <span class="font-bold text-green-500 uppercase text-xs">Free</span>
                        </div>

                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Estimated Tax</span>
                            <span class="font-bold text-gray-900 dark:text-white">$15</span>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-brand-cream/30 dark:border-gray-800">
                        <div class="flex justify-between items-baseline text-gray-900 dark:text-white">
                            <span class="text-base font-bold">Grand Total</span>
                            <span class="text-3xl font-black text-brand-tan">$713</span>
                        </div>
                    </div>

                </div>

                <button
                    class="mt-10 w-full bg-brand-tan text-white py-4 rounded-xl font-black text-sm tracking-widest uppercase shadow-lg shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-200">
                    Place Secure Order
                </button>

                <div class="mt-6 flex flex-col items-center gap-3">
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-[10px] font-bold uppercase tracking-widest">30-Day Money Back Guarantee</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
