<template>
    <header class="header-glass sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <div class="logo-container">
                        <span class="text-2xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-violet-600">
                            CartMe
                        </span>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:block flex-grow max-w-md mx-8">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            placeholder="Search for premium products..."
                            class="block w-full pl-10 pr-3 py-2 border-none bg-gray-100/50 dark:bg-gray-700/50 rounded-xl leading-5 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white dark:focus:bg-gray-800 transition-all duration-300 text-sm"
                        >
                    </div>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Localization -->
                    <div class="hidden sm:flex items-center group cursor-pointer">
                        <select class="bg-transparent border-none text-sm font-medium text-gray-700 dark:text-gray-200 focus:ring-0 cursor-pointer">
                            <option>🇮🇳 IND</option>
                            <option>🇺🇸 USA</option>
                            <option>🇬🇧 GBR</option>
                        </select>
                    </div>

                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-2">
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-600 transition-colors">
                            Sign In
                        </button>
                        <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            Join Free
                        </button>
                    </div>

                    <!-- Cart -->
                    <div class="relative group cursor-pointer p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <svg class="h-6 w-6 text-gray-700 dark:text-gray-200 group-hover:text-indigo-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute top-0 right-0 flex h-4 w-4 items-center justify-center rounded-full bg-indigo-600 text-[10px] font-bold text-white ring-2 ring-white dark:ring-gray-900 group-hover:scale-110 transition-transform">
                            3
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<style scoped>
.header-glass {
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

:deep(.dark) .header-glass {
    background: rgba(31, 41, 55, 0.75);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.logo-container {
    transition: transform 0.3s ease;
}

.logo-container:hover {
    transform: scale(1.05);
}

/* Custom scrollbar for some browsers if needed, though usually global */
</style>