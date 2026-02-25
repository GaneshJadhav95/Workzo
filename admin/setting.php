<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="hidden md:flex md:flex-col w-64 bg-gray-900 p-6 space-y-6">
        <h2 class="text-2xl font-bold">Admin Panel</h2>
        <nav class="space-y-3">
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-800">Dashboard</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-800">Users</a>
            <a href="#" class="block py-2 px-4 rounded bg-gray-800">Settings</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-800">Reports</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-4 md:p-8">

        <h1 class="text-2xl font-bold mb-6">Settings</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Profile Settings -->
            <div class="bg-gray-900 p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Profile Settings</h2>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Full Name</label>
                        <input type="text" placeholder="Enter full name"
                        class="w-full px-4 py-2 bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Email</label>
                        <input type="email" placeholder="Enter email"
                        class="w-full px-4 py-2 bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Username</label>
                        <input type="text" placeholder="Enter username"
                        class="w-full px-4 py-2 bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded mt-2">
                        Save Changes
                    </button>
                </div>
            </div>

            <!-- Password Settings -->
            <div class="bg-gray-900 p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Change Password</h2>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Current Password</label>
                        <input type="password"
                        class="w-full px-4 py-2 bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-1">New Password</label>
                        <input type="password"
                        class="w-full px-4 py-2 bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Confirm Password</label>
                        <input type="password"
                        class="w-full px-4 py-2 bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded mt-2">
                        Update Password
                    </button>
                </div>
            </div>

        </div>

        <!-- Notification Settings -->
        <div class="bg-gray-900 p-6 rounded-xl shadow-lg mt-6">
            <h2 class="text-xl font-semibold mb-4">Notification Settings</h2>

            <div class="space-y-4">

                <div class="flex justify-between items-center">
                    <span>Email Notifications</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-700 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:after:translate-x-full"></div>
                    </label>
                </div>

                <div class="flex justify-between items-center">
                    <span>SMS Alerts</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-700 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:after:translate-x-full"></div>
                    </label>
                </div>

                <div class="flex justify-between items-center">
                    <span>System Updates</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-700 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:after:translate-x-full"></div>
                    </label>
                </div>

            </div>
        </div>

    </div>

</div>

</body>
</html>