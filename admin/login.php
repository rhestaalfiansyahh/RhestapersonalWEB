<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:beranda_admin.php');
}
require_once("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Glass effect */
        .glass {
            backdrop-filter: blur(10px);
            background-color: rgba(0, 0, 0, 0.4);
        }
        /* Neon glow effect */
        .neon-border {
            border: 2px solid #00f2ff;
            box-shadow: 0 0 10px #00f2ff, 0 0 20px #00f2ff inset;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black min-h-screen flex items-center justify-center font-sans">
    <div class="glass neon-border rounded-xl p-8 w-full max-w-md text-white shadow-lg">
        <h2 class="text-3xl font-extrabold text-center text-cyan-400 mb-8 tracking-wide animate-pulse">
            Admin Login
        </h2>
        <form action="cek_login.php" method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-cyan-300 mb-1">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full px-4 py-2 bg-gray-800 border border-cyan-400 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-400"
                    placeholder="Enter your username">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-cyan-300 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 bg-gray-800 border border-cyan-400 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-400"
                    placeholder="Enter your password">
            </div>
            <div class="flex justify-between items-center">
                <input type="submit" name="login" value="Login"
                    class="bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-2 rounded-md transition duration-300 ease-in-out cursor-pointer shadow-md shadow-cyan-600/50">
                <input type="reset" name="cancel" value="Cancel"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-md transition duration-300 ease-in-out cursor-pointer shadow-md">
            </div>
        </form>
        <div class="text-center text-xs text-gray-400 mt-8">
            &copy; <?php echo date('Y'); ?> - rhestaalfiansyah
        </div>
    </div>
</body>

</html>
