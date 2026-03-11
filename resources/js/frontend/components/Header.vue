<template>
    <header class="header-glass sticky top-0 z-50">
        <!-- Top Bar -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 gap-4">
                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button @click="isMobileMenuOpen = !isMobileMenuOpen"
                        class="p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-brand-cream dark:hover:bg-gray-800 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <router-link to="/" class="logo-container">
                        <span class="text-2xl font-extrabold tracking-tight text-brand-tan">
                            CartMe
                        </span>
                    </router-link>
                </div>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-6 text-sm font-medium">
                    <!--a href="#" class="text-gray-700 dark:text-gray-200 hover:text-brand-tan transition-colors">New
                        Arrivals</a-->

                    <router-link to="/product"
                        class="text-gray-700 dark:text-gray-200 hover:text-brand-tan transition-colors">Products</router-link>

                    <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-brand-tan transition-colors">Best
                        Sellers</a>
                    <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-brand-tan transition-colors">Flash
                        Sale</a>
                    <div class="relative group cursor-pointer">
                        <span
                            class="flex items-center text-gray-700 dark:text-gray-200 hover:text-brand-tan transition-colors">
                            Categories
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <!-- Dropdown -->
                        <div
                            class="absolute top-full left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-brand-cream dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="p-2 space-y-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg hover:bg-brand-cream dark:hover:bg-gray-700">Electronics</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg hover:bg-brand-cream dark:hover:bg-gray-700">Fashion</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg hover:bg-brand-cream dark:hover:bg-gray-700">Home
                                    & Decor</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg hover:bg-brand-cream dark:hover:bg-gray-700">Beauty
                                    & Health</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Search Bar (Pushed to middle/right) -->
                <div class="hidden md:block flex-grow max-w-xs xl:max-w-md mx-4">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400 group-focus-within:text-brand-tan transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search..."
                            class="block w-full pl-9 pr-3 py-1.5 border-none bg-brand-cream/50 dark:bg-gray-700/50 rounded-lg leading-5 focus:outline-none focus:ring-2 focus:ring-brand-tan/50 focus:bg-white dark:focus:bg-gray-800 transition-all duration-300 text-sm">
                    </div>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <!-- Localization (Only on larger screens) -->
                    <div class="hidden sm:flex items-center group cursor-pointer">
                        <Country />
                    </div>

                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-1 sm:space-x-2">
                        <button
                            class="hidden sm:block px-3 py-1.5 text-xs font-bold text-gray-700 dark:text-gray-200 hover:text-brand-tan transition-colors uppercase tracking-tight">
                            <router-link to="/login">
                                Sign In
                            </router-link>
                        </button>
                        <button
                            class="px-4 py-2 text-xs font-bold text-white bg-brand-tan hover:opacity-90 dark:bg-brand-tan rounded-lg shadow-md hover:shadow-lg transition-all duration-200 uppercase tracking-tight">
                            <router-link to="/register">
                                Join
                            </router-link>
                        </button>
                    </div>

                    <!-- Cart -->
                    <router-link to="/cart">
                        <div
                            class="relative group cursor-pointer p-2 rounded-full hover:bg-brand-cream dark:hover:bg-gray-800 transition-colors">
                            <svg class="h-5 w-5 text-gray-700 dark:text-gray-200 group-hover:text-brand-tan transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span
                                class="absolute top-1 right-1 flex h-4 w-4 items-center justify-center rounded-full bg-brand-tan text-[10px] font-bold text-white ring-2 ring-white dark:ring-gray-900 group-hover:scale-110 transition-transform">
                                3
                            </span>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div v-show="isMobileMenuOpen"
            class="md:hidden bg-white dark:bg-gray-900 border-t border-brand-cream dark:border-gray-800">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#"
                    class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-brand-cream dark:hover:bg-gray-800">New
                    Arrivals</a>
                <a href="#"
                    class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-brand-cream dark:hover:bg-gray-800">Best
                    Sellers</a>
                <a href="#"
                    class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-brand-cream dark:hover:bg-gray-800">Flash
                    Sale</a>
                <div class="px-3 py-2 text-sm font-bold text-gray-400 uppercase tracking-wider">Categories</div>
                <a href="#"
                    class="block px-6 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-brand-cream dark:hover:bg-gray-800">Electronics</a>
                <a href="#"
                    class="block px-6 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-brand-cream dark:hover:bg-gray-800">Fashion</a>
                <a href="#"
                    class="block px-6 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-brand-cream dark:hover:bg-gray-800">Home</a>
            </div>
        </div>
    </header>
</template>

<!--script>
export default {
    data() {
        return {
            isMobileMenuOpen: false
        }
    }
}
</script-->

<script setup>
import Country from './sub_components/Country.vue';
</script>

<style scoped>
.header-glass {
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(217, 189, 165, 0.2);
}

:deep(.dark) .header-glass {
    background: rgba(17, 24, 39, 0.75);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.logo-container {
    transition: transform 0.3s ease;
}

.logo-container:hover {
    transform: scale(1.05);
}
</style>
