<template>
    <aside
        class="bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-sm border border-brand-cream/50 dark:border-gray-800 h-fit sticky top-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                Filters
            </h2>
            <button
                class="text-xs font-bold text-brand-tan border-b border-brand-tan hover:opacity-80 transition-opacity cursor-pointer">Reset</button>
        </div>

        <div class="space-y-8">
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

            <div>
                <h3 class="font-bold text-sm text-gray-800 dark:text-gray-200 mb-4 uppercase tracking-widest">
                    Price Range</h3>
                <input type="range"
                    class="w-full h-1.5 bg-brand-cream rounded-lg appearance-none cursor-pointer accent-brand-tan">
                <div class="flex justify-between mt-2 text-[10px] font-black text-gray-400 uppercase tracking-tighter">
                    <span>$0</span>
                    <span>$1,000+</span>
                </div>
            </div>
        </div>
    </aside>
</template>
