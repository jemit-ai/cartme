<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">

            <!-- PRODUCT IMAGES -->
            <div class="space-y-6">

                <div
                    class="relative overflow-hidden rounded-3xl group bg-white dark:bg-gray-900 border border-brand-cream/50 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9"
                        class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                    <span
                        class="absolute top-6 left-6 bg-red-500 text-white text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest shadow-lg">
                        Ultimate Edition
                    </span>
                </div>

                <div class="grid grid-cols-4 gap-4">

                    <div
                        class="aspect-square rounded-2xl bg-white dark:bg-gray-900 border-2 border-brand-tan p-1 cursor-pointer shadow-sm">
                        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9"
                            class="w-full h-full object-cover rounded-xl">
                    </div>

                    <div
                        class="aspect-square rounded-2xl bg-white dark:bg-gray-900 border border-brand-cream/50 p-1 cursor-pointer hover:border-brand-tan transition-colors shadow-sm">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                            class="w-full h-full object-cover rounded-xl">
                    </div>

                    <div
                        class="aspect-square rounded-2xl bg-white dark:bg-gray-900 border border-brand-cream/50 p-1 cursor-pointer hover:border-brand-tan transition-colors shadow-sm">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff"
                            class="w-full h-full object-cover rounded-xl">
                    </div>

                    <div
                        class="aspect-square rounded-2xl bg-white dark:bg-gray-900 border border-brand-cream/50 p-1 cursor-pointer hover:border-brand-tan transition-colors shadow-sm">
                        <img src="https://images.unsplash.com/photo-1585386959984-a41552231658"
                            class="w-full h-full object-cover rounded-xl">
                    </div>

                </div>

            </div>

            <!-- PRODUCT INFO -->
            <div class="flex flex-col">

                <div class="mb-8">
                    <nav class="flex mb-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                        <a href="#" class="hover:text-brand-tan">Electronics</a>
                        <span class="mx-2">/</span>
                        <a href="#" class="hover:text-brand-tan">Smartphones</a>
                    </nav>
                    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-3 tracking-tight">
                        Premium Smartphone X
                    </h1>

                    <div class="flex items-center gap-4">
                        <div class="flex text-brand-tan text-sm">
                            ★★★★★
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-tighter">
                            120 Verified Reviews
                        </span>
                        <div class="h-1 w-1 rounded-full bg-gray-300"></div>
                        <span class="text-xs font-bold text-green-500 uppercase">In Stock</span>
                    </div>
                </div>

                <div class="mb-10 p-6 rounded-2xl bg-brand-cream/10 dark:bg-gray-800/50 border border-brand-cream/30">
                    <div class="flex items-baseline gap-4 mb-2">
                        <span class="text-4xl font-black text-brand-tan">
                            $499
                        </span>
                        <span class="text-lg line-through text-gray-400 font-bold">
                            $699
                        </span>
                        <span
                            class="ml-auto bg-brand-tan/10 text-brand-tan text-[10px] font-black px-2 py-1 rounded-md uppercase tracking-widest">
                            Save $200
                        </span>
                    </div>
                </div>

                <!-- VARIANTS -->
                <div class="mb-8">
                    <h3 class="text-xs font-bold text-gray-900 dark:text-white uppercase tracking-widest mb-4">
                        Select Aesthetic
                    </h3>
                    <div class="flex gap-4">
                        <button
                            class="w-10 h-10 rounded-full bg-slate-900 ring-2 ring-offset-2 ring-brand-tan transition-all"></button>
                        <button
                            class="w-10 h-10 rounded-full bg-brand-tan ring-2 ring-offset-2 ring-transparent hover:ring-brand-tan transition-all"></button>
                        <button
                            class="w-10 h-10 rounded-full bg-brand-cream ring-2 ring-offset-2 ring-transparent hover:ring-brand-tan transition-all"></button>
                    </div>
                </div>

                <!-- QUANTITY -->
                <div class="mb-10">
                    <h3 class="text-xs font-bold text-gray-900 dark:text-white uppercase tracking-widest mb-4">
                        Quantity
                    </h3>
                    <div
                        class="flex items-center bg-white dark:bg-gray-800 border border-brand-cream/50 rounded-xl p-1 w-fit shadow-sm">
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-brand-cream/20 transition-colors text-gray-500">-</button>
                        <span class="px-6 font-black text-sm">1</span>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-brand-cream/20 transition-colors text-gray-500">+</button>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-col sm:flex-row gap-4 mt-auto">
                    <button
                        class="flex-1 bg-brand-tan text-white px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-brand-tan/20 hover:opacity-95 transform hover:-translate-y-0.5 transition-all duration-200">
                        Add to Bag
                    </button>
                    <button
                        class="flex-1 border-2 border-brand-tan text-brand-tan px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-brand-tan/5 transition-all">
                        Buy Now
                    </button>
                </div>

            </div>

        </div>

        <!-- PRODUCT DESCRIPTION -->
        <div class="mt-20 grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-gray-900 p-10 rounded-3xl shadow-sm border border-brand-cream/50 dark:border-gray-800">
                    <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-6">
                        Product Details
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed space-y-4">
                        The Smartphone X redefining premium performance. Featuring a stunning 6.7-inch Super Retina
                        display,
                        the proprietary processor that pushes mobile gaming to its limits, and a triple-lens camera
                        system
                        crafted for cinematic capture.
                    </p>
                    <ul class="mt-8 space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-brand-tan" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Titanium Grade Build Quality
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-brand-tan" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Next-Gen Neural Engine
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-brand-tan" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Spatial Audio Integration
                        </li>
                    </ul>
                </div>
            </div>

            <!-- REVIEWS -->
            <div
                class="bg-white dark:bg-gray-900 p-10 rounded-3xl shadow-sm border border-brand-cream/50 dark:border-gray-800">
                <h2 class="text-xl font-extrabold text-gray-900 dark:text-white mb-8">
                    Top Reviews
                </h2>
                <div class="space-y-8">
                    <div class="relative pl-6 border-l-2 border-brand-tan/30">
                        <div class="flex text-[10px] text-brand-tan mb-2 font-bold uppercase tracking-widest">★★★★★
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 italic">
                            "Absolutely incredible display quality and the battery life is unmatched by any other
                            flagship."
                        </p>
                        <p class="mt-2 text-[10px] font-black text-gray-400 uppercase tracking-tighter">Michael R.</p>
                    </div>
                    <div class="relative pl-6 border-l-2 border-brand-tan/30">
                        <div class="flex text-[10px] text-brand-tan mb-2 font-bold uppercase tracking-widest">★★★★★
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 italic">
                            "The design feels so premium in hand. It's truly a piece of professional hardware."
                        </p>
                        <p class="mt-2 text-[10px] font-black text-gray-400 uppercase tracking-tighter">Sophia L.</p>
                    </div>
                </div>
                <button
                    class="mt-8 w-full py-3 rounded-xl border border-brand-cream text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-brand-tan transition-colors">
                    View All 120 Reviews
                </button>
            </div>
        </div>

        <!-- RELATED PRODUCTS -->
        <div class="mt-24">
            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-10 tracking-tight">
                Complete Your Experience
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Related 1 -->
                <div
                    class="group bg-white dark:bg-gray-900 rounded-3xl border border-brand-cream/50 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="aspect-square overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                    </div>
                    <div class="p-6">
                        <h3
                            class="font-bold text-sm text-gray-800 dark:text-white group-hover:text-brand-tan transition-colors">
                            Elegance Watch</h3>
                        <p class="mt-1 text-brand-tan font-black text-base">$199</p>
                    </div>
                </div>
                <!-- Related 2 -->
                <div
                    class="group bg-white dark:bg-gray-900 rounded-3xl border border-brand-cream/50 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="aspect-square overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                    </div>
                    <div class="p-6">
                        <h3
                            class="font-bold text-sm text-gray-800 dark:text-white group-hover:text-brand-tan transition-colors">
                            Stride Runners</h3>
                        <p class="mt-1 text-brand-tan font-black text-base">$120</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>