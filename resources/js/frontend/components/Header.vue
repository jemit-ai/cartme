<template>
    <header class="bg-white shadow sticky top-0 z-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

            <div class="text-2xl font-bold text-indigo-600">
                ShopX
            </div>

            <div class="w-1/3 hidden md:block">
                <input type="text" placeholder="Search products..."
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center gap-4">

                <select class="border rounded px-2 py-1 text-sm dark:bg-gray-700">
                    <option>🇮🇳 India</option>
                    <option>🇺🇸 USA</option>
                    <option>🇬🇧 UK</option>
                </select>

                <button class="text-sm">Login</button>
                <button class="bg-indigo-600 text-white px-3 py-1 rounded text-sm">
                    Register
                </button>

                <div class="relative">
                    🛒
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded">
                        2
                    </span>
                </div>

            </div>
        </div>
    </header>
</template>