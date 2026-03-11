<template>

    <!-- HERO -->
    <section class="bg-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 items-center">

            <div>
                <h1 class="text-4xl font-bold mb-4">
                    Big Summer Sale
                </h1>

                <p class="mb-6 text-lg">
                    Up to 50% discount on electronics and fashion.
                </p>

                <button class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold">
                    Shop Now
                </button>
            </div>

            <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db" class="rounded-lg shadow-lg">
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-2xl font-bold mb-8">
            Shop by Category
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 text-center">

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
                📱
                <p class="mt-2">Electronics</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
                👕
                <p class="mt-2">Fashion</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
                🏠
                <p class="mt-2">Home</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
                💄
                <p class="mt-2">Beauty</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
                ⚽
                <p class="mt-2">Sports</p>
            </div>

        </div>
    </section>

    <!-- FEATURED PRODUCTS -->
    <section class="bg-gray-100 dark:bg-gray-800 py-16">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-2xl font-bold mb-10">
                Featured Products
            </h2>

            <div class="grid md:grid-cols-4 gap-8">

                <!-- PRODUCT -->
                <div class="bg-white rounded-lg shadow hover:shadow-xl transition p-4">

                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9" class="rounded mb-4">

                    <h3 class="font-semibold">
                        Smart Phone
                    </h3>

                    <p class="text-indigo-600 font-bold">
                        $499
                        <span class="line-through text-gray-400 text-sm">$699</span>
                    </p>

                    <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded">
                        Add to Cart
                    </button>

                </div>

                <!-- PRODUCT -->
                <div class="bg-white rounded-lg shadow hover:shadow-xl transition p-4">

                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="rounded mb-4">

                    <h3 class="font-semibold">
                        Smart Watch
                    </h3>

                    <p class="text-indigo-600 font-bold">
                        $199
                    </p>

                    <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded">
                        Add to Cart
                    </button>

                </div>

            </div>

        </div>
    </section>

    <!-- FLASH SALE -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-2xl font-bold mb-4">
            Flash Sale
        </h2>

        <p class="text-red-500 mb-8">
            Ends in: <span id="timer">12:45:20</span>
        </p>

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white p-4 rounded shadow">
                Flash Deal Product
            </div>

        </div>

    </section>

    <!-- PROMO BANNER -->
    <section class="bg-indigo-600 text-white py-16 text-center">

        <h2 class="text-3xl font-bold mb-4">
            Get 30% Discount
        </h2>

        <button class="bg-white text-indigo-600 px-6 py-3 rounded-lg">
            Shop Deals
        </button>

    </section>

    <!-- TESTIMONIALS -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-2xl font-bold mb-10">
            What Customers Say
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded shadow">
                ⭐️⭐️⭐️⭐️⭐️
                <p class="mt-2">
                    Amazing products and fast delivery.
                </p>
            </div>

        </div>

    </section>

    <!-- NEWSLETTER -->
    <section class="bg-gray-100 dark:bg-gray-800 py-16 text-center">

        <h2 class="text-2xl font-bold mb-4">
            Subscribe to Newsletter
        </h2>

        <div class="flex justify-center">

            <input type="email" placeholder="Enter email" class="px-4 py-2 border rounded-l">

            <button class="bg-indigo-600 text-white px-6 py-2 rounded-r">
                Subscribe
            </button>

        </div>

    </section>

</template>