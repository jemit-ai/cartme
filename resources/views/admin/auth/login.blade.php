<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gray-900 py-4 text-center">
                <h4 class="text-white text-xl font-semibold">Admin Login</h4>
            </div>

            <div class="p-8">

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                    </div>

                    <button class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                        Login
                    </button>

                </form>

            </div>
        </div>
    </div>

</body>
</html>
