<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-10 tracking-tight">
            Discover Our Collections
        </h1>

        <div class="grid lg:grid-cols-4 gap-10">

            <!-- FILTER SIDEBAR -->
            <aside
                class="bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-sm border border-brand-cream/50 dark:border-gray-800 h-fit sticky top-24">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                        Filters
                    </h2>
                    <button
                        class="text-xs font-bold text-brand-tan border-b border-brand-tan hover:opacity-80 transition-opacity">Reset</button>
                </div>

                <div class="space-y-8">
                    <!-- Category -->
                    <div>
                        <h3 class="font-bold text-sm text-gray-800 dark:text-gray-200 mb-4 uppercase tracking-widest">
                            Category</h3>
                        <div class="space-y-3">
                            <label v-for="cat in ['Electronics', 'Fashion', 'Home', 'Beauty']" :key="cat"
                                class="flex items-center group cursor-pointer">
                                <input type="checkbox"
                                    class="w-4 h-4 rounded border-brand-cream text-brand-tan focus:ring-brand-tan">
                                <span
                                    class="ml-3 text-sm text-gray-600 dark:text-gray-400 group-hover:text-brand-tan transition-colors">{{
                                        cat }}</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <h3 class="font-bold text-sm text-gray-800 dark:text-gray-200 mb-4 uppercase tracking-widest">
                            Price Range</h3>
                        <input type="range"
                            class="w-full h-1.5 bg-brand-cream rounded-lg appearance-none cursor-pointer accent-brand-tan">
                        <div
                            class="flex justify-between mt-2 text-[10px] font-black text-gray-400 uppercase tracking-tighter">
                            <span>$0</span>
                            <span>$1,000+</span>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- PRODUCT AREA -->
            <div class="lg:col-span-3">

                <!-- TOP BAR -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <p
                        class="text-xs font-bold text-gray-400 uppercase tracking-widest bg-brand-cream/20 dark:bg-gray-800 px-4 py-2 rounded-full">
                        Showing 12 premium products
                    </p>

                    <div class="relative group">
                        <select
                            class="appearance-none bg-white dark:bg-gray-900 border border-brand-cream/50 dark:border-gray-800 rounded-xl px-4 py-2 pr-10 text-xs font-bold uppercase tracking-widest text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-brand-tan transition-all cursor-pointer">
                            <option>Sort by Latest</option>
                            <option>Price Low to High</option>
                            <option>Price High to Low</option>
                        </select>
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-brand-tan">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT GRID -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <ProductCard v-for="product in products" :key="product.id" :product="product" />
                </div>

                <!-- PAGINATION -->
                <div class="flex justify-center mt-20">
                    <div class="flex items-center gap-3">
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-brand-tan text-white shadow-lg shadow-brand-tan/20 font-black text-xs">1</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-900 border border-brand-cream/50 dark:border-gray-800 text-gray-400 hover:text-brand-tan transition-all font-black text-xs">2</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-900 border border-brand-cream/50 dark:border-gray-800 text-gray-400 hover:text-brand-tan transition-all font-black text-xs">3</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import api from '../services/api';

import ProductCard from '../components/sub_components/product/ProductCard.vue';

/*const products = ref([]);

const getProducts = async () => {
    try {
        const response = await api.get('/products');
        products.value = response.data;
    } catch (error) {
        console.error('Error fetching products:', error);
    }
}

getProducts();*/

const products = ref([
    {
        id: 1,
        name: 'Smartphone',
        description: 'Latest model',
        price: 499,
        image: 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9'
    },
    {
        id: 2,
        name: 'Smart Watch',
        description: 'Fitness tracker',
        price: 199,
        image: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30'
    },
    {
        id: 3,
        name: 'Running Shoes',
        description: 'Comfort sports shoes',
        price: 120,
        image: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff'
    }
]);
</script>
