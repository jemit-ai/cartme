<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        .sidebar-transition { transition: width 0.3s ease-in-out, transform 0.3s ease-in-out; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800" x-data="{ collapsed: false, mobileOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Backdrop (Mobile) -->
        <div x-show="mobileOpen" @click="mobileOpen = false" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 md:hidden" x-cloak></div>

        <!-- Sidebar -->
        <aside 
            class="bg-gray-900 text-white fixed md:relative z-30 inset-y-0 left-0 flex flex-col sidebar-transition"
            :class="{ 
                'w-64': !collapsed, 
                'w-20': collapsed,
                'translate-x-0': mobileOpen,
                '-translate-x-full': !mobileOpen && window.innerWidth < 768,
                'translate-x-0 md:translate-x-0': true
            }"
        >
            <div class="h-16 flex items-center justify-center border-b border-gray-800">
                <h1 class="text-xl font-bold tracking-wider truncate px-4" x-show="!collapsed">ADMIN PANEL</h1>
                <h1 class="text-xl font-bold tracking-wider" x-show="collapsed">AP</h1>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto overflow-x-hidden">
                @php
                    $menuItems = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                        ['route' => 'admin.users', 'label' => 'Users', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                        
                ['route' => '#', 'label' => 'Suppliers', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['route' => '#', 'label' => 'Sellers', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        

                ['route' => 'admin.products.index', 'label' => 'Products', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'children' => [
                            ['route' => 'admin.products.index', 'label' => 'All Products'],
                            ['route' => 'admin.categories.index', 'label' => 'Category'],
                            ['route' => 'admin.products.import', 'label' => 'Import Products'],
                ]],
                        
                        
                 ['route' => 'admin.orders.index', 'label' => 'Orders', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'], 
                        
                 ['route' => '#', 'label' => 'Reports', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                 ['route' => '#', 'label' => 'Transactions', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
                 ['route' => '#', 'label' => 'Earnings', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                 ['route' => '#', 'label' => 'Settings', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z,M15 12a3 3 0 11-6 0 3 3 0 016 0z']

                ];
                @endphp

                @foreach($menuItems as $item)
                    @php
                        $paths = explode(',', $item['icon']);
                        $hasChildren = isset($item['children']) && count($item['children']) > 0;
                        $isActive = false;
                        if (!$hasChildren) {
                            $routeUrl = $item['route'] === '#' ? '#' : (Route::has($item['route']) ? route($item['route']) : '#');
                            $isActive = request()->routeIs($item['route']);
                        } else {
                            $routeUrl = 'javascript:void(0)';
                            foreach($item['children'] as $child) {
                                if (request()->routeIs($child['route'])) {
                                    $isActive = true;
                                    break;
                                }
                            }
                        }
                    @endphp

                    <div x-data="{ open: {{ $isActive ? 'true' : 'false' }} }">
                        <a @if($hasChildren) @click="open = !open" @endif 
                           href="{{ $routeUrl }}" 
                           class="flex items-center py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition duration-200 group relative"
                           :class="{
                               'justify-center px-2': collapsed,
                               'px-4': !collapsed,
                               'bg-gray-800 text-white': {{ $isActive ? 'true' : 'false' }} && !{{ $hasChildren ? 'true' : 'false' }}
                           }"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" :class="collapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @foreach($paths as $d)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ trim($d) }}"></path>
                                @endforeach
                            </svg>
                            
                            <span class="whitespace-nowrap transition-opacity duration-200 flex-1" :class="collapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'" x-show="!collapsed">
                                {{ $item['label'] }}
                                @if($item['label'] === 'Orders' && isset($globalPendingOrdersCount) && $globalPendingOrdersCount > 0)
                                    <span class="ml-2 bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">
                                        {{ $globalPendingOrdersCount }}
                                    </span>
                                @endif
                            </span>

                            @if($hasChildren)
                                <svg x-show="!collapsed" class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            @endif

                            <!-- Tooltip for collapsed state -->
                            <div x-show="collapsed" 
                                 class="absolute left-full top-1/2 transform -translate-y-1/2 ml-2 bg-gray-900 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity z-50 whitespace-nowrap"
                                 x-cloak>
                                {{ $item['label'] }}
                            </div>
                        </a>

                        @if($hasChildren)
                            <div x-show="open && !collapsed" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 class="mt-1 space-y-1 pl-11"
                            >
                                @foreach($item['children'] as $child)
                                    <a href="{{ Route::has($child['route']) ? route($child['route']) : '#' }}" 
                                       class="block py-2 text-sm text-gray-400 hover:text-white transition duration-200 {{ request()->routeIs($child['route']) ? 'text-white font-medium' : '' }}">
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden relative transition-all duration-300">

            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 z-10">
                <div class="flex items-center">
                    <!-- Mobile Sidebar Toggle -->
                    <button @click="mobileOpen = !mobileOpen" class="md:hidden text-gray-500 focus:outline-none hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>

                    <!-- Desktop Sidebar Collapse Toggle -->
                    <button @click="collapsed = !collapsed" class="hidden md:block text-gray-500 focus:outline-none hover:text-gray-700 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <span class="text-xl font-semibold text-gray-800 ml-2">Admin Panel</span>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Notification Bell -->
                    <div class="relative group mr-2">
                        <button class="text-gray-500 hover:text-gray-900 focus:outline-none relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            @if(isset($globalPendingOrdersCount) && $globalPendingOrdersCount > 0)
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full ring-2 ring-white">
                                    {{ $globalPendingOrdersCount }}
                                </span>
                            @endif
                        </button>
                        <!-- Dropdown Mockup (could be made functional with a controller) -->
                        <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 hidden group-hover:block z-50">
                            <div class="px-4 py-2 border-b border-gray-50 flex justify-between items-center">
                                <span class="text-sm font-bold text-gray-900">Notifications</span>
                                <span class="text-xs text-blue-600 hover:underline cursor-pointer">Mark all as read</span>
                            </div>
                            <div class="max-h-64 overflow-y-auto">
                                @if(isset($globalPendingOrdersCount) && $globalPendingOrdersCount > 0)
                                    <div class="px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                        <div class="flex items-start gap-3">
                                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-900 font-medium">You have {{ $globalPendingOrdersCount }} pending orders</p>
                                                <p class="text-xs text-gray-500 mt-0.5">Check the dashboard for details</p>
                                                <p class="text-[10px] text-blue-600 font-medium mt-1">Just now</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="px-4 py-8 text-center">
                                        <p class="text-sm text-gray-400">No new notifications</p>
                                    </div>
                                @endif
                            </div>
                            <div class="px-4 py-2 border-t border-gray-50 text-center">
                                <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-gray-900 hover:underline">View Dashboard</a>
                            </div>
                        </div>
                    </div>

                    <span class="text-gray-700 text-sm font-medium hidden sm:block">Hello, {{ Auth::guard('admin')->user()->name }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="bg-gray-900 hover:bg-gray-800 text-white text-xs px-4 py-2 rounded shadow transition duration-200">
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
