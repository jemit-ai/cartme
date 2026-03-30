<template>

    <!-- HERO -->
    <section class="bg-brand-tan text-white">
        <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 items-center">

            <div>
                <h1 class="text-4xl font-bold mb-4">
                    Big Summer Sale
                </h1>

                <p class="mb-6 text-lg text-white/90">
                    Up to 50% discount on electronics and fashion.
                </p>

                <button
                    class="bg-white text-brand-tan px-6 py-3 rounded-lg font-semibold shadow-lg hover:bg-gray-50 transition-colors">
                    Shop Now
                </button>
            </div>

            <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db" class="rounded-lg shadow-2xl">
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-2xl font-bold mb-8">
            Shop by Category
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 text-center">

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                <div class="text-3xl mb-2 group-hover:scale-110 transition-transform">📱</div>
                <p class="mt-2 text-sm font-medium text-gray-700">Electronics</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                <div class="text-3xl mb-2 group-hover:scale-110 transition-transform">👕</div>
                <p class="mt-2 text-sm font-medium text-gray-700">Fashion</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                <div class="text-3xl mb-2 group-hover:scale-110 transition-transform">🏠</div>
                <p class="mt-2 text-sm font-medium text-gray-700">Home</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                <div class="text-3xl mb-2 group-hover:scale-110 transition-transform">💄</div>
                <p class="mt-2 text-sm font-medium text-gray-700">Beauty</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                <div class="text-3xl mb-2 group-hover:scale-110 transition-transform">⚽</div>
                <p class="mt-2 text-sm font-medium text-gray-700">Sports</p>
            </div>

        </div>
    </section>

    <!-- FEATURED PRODUCTS -->
    <section class="bg-brand-cream/30 dark:bg-gray-800/50 py-16">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-2xl font-bold mb-10">
                Featured Products
            </h2>

            <div class="grid md:grid-cols-4 gap-8">
                <ProductCard v-for="product in products" :key="product.id" :product="product" />
            </div>

        </div>
    </section>

    <!-- FLASH SALE -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-2xl font-bold mb-4">
            Flash Sale
        </h2>

        <p class="text-red-500 font-medium mb-8">
            Ends in: <span id="timer" class="font-mono bg-red-50 px-2 py-1 rounded">12:45:20</span>
        </p>

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white p-8 rounded-xl shadow-sm border border-brand-cream/50">
                Flash Deal Product
            </div>

        </div>

    </section>

    <!-- PROMO BANNER -->
    <section class="bg-brand-tan text-white py-16 text-center">

        <h2 class="text-3xl font-bold mb-4">
            Get 30% Discount
        </h2>

        <button
            class="bg-white text-brand-tan px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-gray-50 transition-colors">
            Shop Deals
        </button>

    </section>

    <!-- TESTIMONIALS -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-2xl font-bold mb-10">
            What Customers Say
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-8 rounded-xl shadow-sm border border-brand-cream/50">
                <div class="text-brand-tan mb-3 text-lg">⭐️⭐️⭐️⭐️⭐️</div>
                <p class="text-gray-600 dark:text-gray-300 italic">
                    "Amazing products and fast delivery. The quality exceeded my expectations!"
                </p>
                <div class="mt-4 font-bold text-sm text-gray-800 dark:text-white">— Sarah J.</div>
            </div>

        </div>

    </section>

    <!-- NEWSLETTER -->
    <section class="bg-brand-cream/30 dark:bg-gray-900 py-20 text-center">

        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
            Subscribe to Newsletter
        </h2>
        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Stay updated with our latest collections and
            exclusive offers sent directly to your inbox.</p>

        <div class="flex justify-center max-w-md mx-auto">

            <input type="email" placeholder="Enter your email"
                class="w-full px-4 py-3 bg-white dark:bg-gray-800 border-none rounded-l-xl focus:ring-2 focus:ring-brand-tan text-sm">

            <button class="bg-brand-tan text-white px-8 py-3 rounded-r-xl font-bold hover:opacity-90 transition-all">
                Join
            </button>

        </div>

    </section>

</template>

<script setup>
import { ref } from 'vue';
import api from '../services/api';
import ProductCard from '../components/sub_components/product/ProductCard.vue';


const products = ref([]);

const getProducts = async () => {
    try {
        const response = await api.get('/products');
        products.value = response.data.data.data;
    } catch (error) {
        console.log('Error fetching products:', error);
    }
}

getProducts();

</script>
