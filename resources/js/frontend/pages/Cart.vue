<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 tracking-tight">Shopping Bag</h1>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- CART ITEMS -->
            <div class="lg:col-span-2 space-y-6">

                <div v-if="items.length > 0" class="space-y-6">
                    <CartItem v-for="item in items" :key="item.id" :item="item" />
                </div>

                <div v-else-if="!loading"
                    class="text-center py-20 bg-white dark:bg-gray-900 rounded-2xl border border-brand-cream/50">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Empty Bag</h3>
                    <p class="mt-1 text-sm text-gray-500">Your shopping bag is empty.</p>
                    <div class="mt-6">
                        <router-link to="/product"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-brand-tan hover:opacity-90">
                            Start Shopping
                        </router-link>
                    </div>
                </div>

                <div v-else class="text-center py-20">
                    <p class="text-gray-500 animate-pulse">Loading your bag...</p>
                </div>

            </div>

            <!-- ORDER SUMMARY -->
            <div
                class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 h-fit sticky top-24">

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
                        <button
                            class="px-4 py-2.5 rounded-xl border border-brand-tan/30 text-brand-tan font-bold text-xs uppercase hover:bg-brand-cream/20 transition-all">
                            Apply
                        </button>
                    </div>
                </div>

                <!--button class="mt-8 w-full bg-brand-tan text-white py-4 rounded-xl font-bold text-sm tracking-widest uppercase shadow-lg shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-200">
                    Checkout Now
                </button-->

                <router-link to="/checkout">
                    <button
                        class="mt-8 w-full bg-brand-tan text-white py-4 rounded-xl font-bold text-sm tracking-widest uppercase shadow-lg shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-200">
                        Checkout Now
                    </button>
                </router-link>



                <div class="mt-6 flex items-center justify-center gap-2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="text-[10px] font-bold uppercase tracking-widest">SSL Encrypted Secure Payment</span>
                </div>

            </div>

        </div>

    </div>
</template>

<script setup>

import { onMounted } from 'vue';
import { ref } from 'vue';
import api from '../services/api';
import { useCartStore } from '../stores/cart';
import { storeToRefs } from 'pinia';

import CartItem from '../components/sub_components/cart/CartItem.vue';

const cartStore = useCartStore();
const { items, loading } = storeToRefs(cartStore);

onMounted(() => {
    cartStore.fetchCart();
})

</script>
