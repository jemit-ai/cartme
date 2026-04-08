<template>

    <div
        class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-brand-cream/50 dark:border-gray-800 flex flex-col sm:flex-row items-center gap-6 transition-all hover:shadow-md">

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

                <div
                    class="flex items-center bg-brand-cream/20 dark:bg-gray-800 rounded-lg p-1 border border-brand-cream/30">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-300">-</button>
                    <span class="px-4 font-bold text-sm">1</span>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-300">+</button>
                </div>

                <button
                    class="text-red-400 hover:text-red-600 dark:hover:text-red-500 text-xs font-bold uppercase tracking-wider transition-colors">
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

</template>