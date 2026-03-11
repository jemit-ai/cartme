<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-10 tracking-tight">
            Discover Our Collections
        </h1>

        <div class="grid lg:grid-cols-4 gap-10">

            <!-- FILTER SIDEBAR -->
            <aside
                class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 h-fit sticky top-24">

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
                        <h3 class="font-bold text-sm text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                            Category
                        </h3>
                        <div class="space-y-3">
                            <label v-for="cat in ['Electronics', 'Fashion', 'Home Decor', 'Beauty', 'Sports']"
                                :key="cat" class="flex items-center group cursor-pointer">
                                <input type="checkbox"
                                    class="w-4 h-4 rounded border-gray-300 text-brand-tan focus:ring-brand-tan">
                                <span
                                    class="ml-3 text-sm text-gray-600 dark:text-gray-400 group-hover:text-brand-tan transition-colors">{{
                                        cat }}</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <h3 class="font-bold text-sm text-gray-800 dark:text-gray-200 mb-4">Price Range</h3>
                        <div class="space-y-4">
                            <input type="range"
                                class="w-full h-1 bg-brand-cream rounded-lg appearance-none cursor-pointer accent-brand-tan">
                            <div class="flex justify-between text-xs font-bold text-gray-400">
                                <span>$0</span>
                                <span>$10,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div>
                        <h3 class="font-bold text-sm text-gray-800 dark:text-gray-200 mb-4">Brand</h3>
                        <div class="relative">
                            <select
                                class="w-full bg-brand-cream/10 dark:bg-gray-800 border-none rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-tan transition-all appearance-none">
                                <option>All Brands</option>
                                <option>Apple</option>
                                <option>Samsung</option>
                                <option>Sony</option>
                                <option>Nike</option>
                            </select>
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- PRODUCTS SECTION -->
            <div class="lg:col-span-3">

                <!-- TOP BAR -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-10 gap-4">

                    <div class="relative w-full sm:max-w-md group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400 group-focus-within:text-brand-tan transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search premium items..."
                            class="block w-full pl-9 pr-3 py-2.5 bg-white dark:bg-gray-900 border-none rounded-xl text-sm focus:ring-2 focus:ring-brand-tan/50 shadow-sm transition-all">
                    </div>

                    <div class="flex items-center gap-4 w-full sm:w-auto">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest whitespace-nowrap">Sort
                            By</span>
                        <div class="relative flex-grow sm:flex-grow-0">
                            <select
                                class="w-full sm:w-48 bg-white dark:bg-gray-900 border-none rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-brand-tan shadow-sm appearance-none pr-10">
                                <option>Recommended</option>
                                <option>Newest Arrivals</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                            </select>
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- PRODUCT GRID -->
                <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">

                    <!-- PRODUCT CARD 1 -->
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 group ring-1 ring-brand-cream/50 dark:ring-gray-800">
                        <div class="relative overflow-hidden aspect-square">
                            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <span
                                class="absolute top-4 left-4 bg-red-500 text-white text-[10px] font-black px-2 py-1 rounded-full uppercase tracking-widest">
                                Limitless
                            </span>
                            <button
                                class="absolute top-4 right-4 p-2 rounded-full bg-white/90 dark:bg-gray-800/90 shadow-md opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0 duration-300">
                                <svg class="h-5 w-5 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-6">
                            <h3
                                class="font-bold text-gray-900 dark:text-white mb-1 group-hover:text-brand-tan transition-colors">
                                Smartphone X</h3>
                            <p class="text-xs text-gray-500 mb-4">Ultimate performance and style</p>

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xl font-black text-brand-tan">$499</p>
                                    <p class="text-[10px] text-gray-400 line-through font-bold">$699</p>
                                </div>
                                <button
                                    class="bg-brand-tan text-white p-2.5 rounded-xl shadow-lg shadow-brand-tan/20 hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT CARD 2 -->
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 group ring-1 ring-brand-cream/50 dark:ring-gray-800">
                        <div class="relative overflow-hidden aspect-square">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>

                        <div class="p-6">
                            <h3
                                class="font-bold text-gray-900 dark:text-white mb-1 group-hover:text-brand-tan transition-colors">
                                Elegance Watch</h3>
                            <p class="text-xs text-gray-500 mb-4">Series 8 | Pure Aesthetic</p>

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xl font-black text-brand-tan">$199</p>
                                </div>
                                <button
                                    class="bg-brand-tan text-white p-2.5 rounded-xl shadow-lg shadow-brand-tan/20 hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT CARD 3 -->
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 group ring-1 ring-brand-cream/50 dark:ring-gray-800">
                        <div class="relative overflow-hidden aspect-square">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>

                        <div class="p-6">
                            <h3
                                class="font-bold text-gray-900 dark:text-white mb-1 group-hover:text-brand-tan transition-colors">
                                Stride Runners</h3>
                            <p class="text-xs text-gray-500 mb-4">Maximum comfort and speed</p>

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xl font-black text-brand-tan">$120</p>
                                </div>
                                <button
                                    class="bg-brand-tan text-white p-2.5 rounded-xl shadow-lg shadow-brand-tan/20 hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- PAGINATION -->
                <div class="flex justify-center mt-20 gap-3">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-900 text-brand-tan font-bold border border-brand-cream hover:bg-brand-cream/20 transition-all shadow-sm">1</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-900 text-gray-500 border border-transparent hover:border-brand-cream transition-all">2</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-900 text-gray-500 border border-transparent hover:border-brand-cream transition-all">3</button>
                    <button
                        class="px-6 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-900 text-gray-500 font-bold text-xs uppercase tracking-widest border border-brand-cream hover:text-brand-tan transition-all shadow-sm">Next</button>
                </div>

            </div>

        </div>

    </div>
</template>
