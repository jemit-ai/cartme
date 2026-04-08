<template>

    <div
        class="group bg-white dark:bg-gray-900 rounded-[2rem] overflow-hidden border border-brand-cream/50 dark:border-gray-800 shadow-sm hover:shadow-2xl transition-all duration-500">
        <div class="aspect-square overflow-hidden relative">
            <img :src="product.image || 'https://images.unsplash.com/photo-1523275335684-37898b6baf30'"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity">
            </div>
        </div>

        <div class="p-8 text-center">
            <h3
                class="font-black text-gray-900 dark:text-white group-hover:text-brand-tan transition-colors duration-300">
                {{ product.name }}
            </h3>
            <p class="mt-1 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                {{ product.description }}
            </p>
            <div class="mt-6 flex items-center justify-between gap-4">
                <span class="text-xl font-black text-brand-tan">{{ product.price }}</span>
                <button @click="addToCart(product.id)"
                    class="bg-brand-tan text-white px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-brand-tan/20 hover:opacity-90 transform hover:-translate-y-0.5 transition-all">
                    Add to Bag
                </button>
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import api from '../../../services/api';
import { useCartStore } from '../../../stores/cart.js';

const cartStore = useCartStore();

const props = defineProps({

    product: {
        type: Object,
        required: true
    }

})

const addToCart = async (productId) => {

    //console.log('Add to cart:', productId);

    try {

        await cartStore.addToCart(productId);
        console.log('Product added to cart:', productId);

    } catch (error) {

        console.log('Error adding to cart:', error);

    }


}
</script>