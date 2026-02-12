<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Supplier Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-4 border-b border-blue-700 text-center">
                <h1 class="text-xl font-bold tracking-wider">SUPPLIER PANEL</h1>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">
                <a href="{{ route('supplier.dashboard') }}" class="flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-700 hover:text-white rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-700 hover:text-white rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    My Products
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-700 hover:text-white rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    Stock
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-700 hover:text-white rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Reports
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 z-10">
                <div class="flex items-center">
                    <button class="md:hidden text-gray-500 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <span class="text-xl font-semibold text-gray-800 md:hidden ml-4">Supplier Panel</span>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 text-sm font-medium">Hello, {{ Auth::guard('supplier')->user()->name }}</span>
                    <form method="POST" action="{{ route('supplier.logout') }}">
                        @csrf
                        <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-4 py-2 rounded shadow transition duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                @yield('content')
            </main>

        </div>

    </div>

    @stack('scripts')
</body>
</html>
