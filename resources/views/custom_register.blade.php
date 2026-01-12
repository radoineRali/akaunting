<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Akaunting</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-akaunting { background-color: #6da252; }
        .text-akaunting { color: #6da252; }
    </style>
</head>

<body class="bg-[#f3f6f1] min-h-screen flex items-center justify-center font-sans">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl px-8 py-10">

        <div class="text-center mb-8">
            <img src="https://akaunting.com/public/assets/media/logos/logo-green.svg"
                 alt="Akaunting" class="h-9 mx-auto mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Create an account</h1>
            <p class="text-gray-500 text-sm mt-1">
                Simple DevOps demo application
            </p>
        </div>

        <form class="space-y-5" method="POST" action="/my-register">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Full name
                </label>
                <input type="text" name="name" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="John Doe">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email address
                </label>
                <input type="email" name="email" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="john@example.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full bg-akaunting text-white py-3 rounded-lg font-semibold text-lg hover:bg-green-700 transition">
                Register
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-600">
            Already have an account?
            <a href="/auth/login" class="text-akaunting font-semibold hover:underline">
                Login
            </a>
        </div>

        <div class="text-center mt-4">
            <a href="/" class="text-xs text-gray-400 hover:text-gray-600">
                ← Back to home
            </a>
        </div>

    </div>

</body>
</html>
