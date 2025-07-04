<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #0f0f0f;
            color: #e0e0e0;
        }

        .glow-text {
            text-shadow: 0 0 8px #3b82f6;
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        input, textarea {
            background-color: #1a1a1a;
            color: #e0e0e0;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 5px #3b82f6;
        }

        a:hover {
            color: #3b82f6;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="bg-black text-white text-center py-6 shadow-md border-b border-gray-800">
        <h1 class="text-4xl font-bold glow-text">Tambah Artikel Baru</h1>
    </header>

    <div class="flex flex-col md:flex-row max-w-7xl mx-auto mt-8 px-4 gap-6">
        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 p-4 rounded-xl glass shadow">
            <h2 class="text-2xl font-semibold text-blue-500 mb-4 text-center">🧭 MENU</h2>
            <ul class="space-y-3 text-lg">
                <li><a href="beranda_admin.php" class="block hover:text-blue-400">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block font-semibold text-blue-400">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-blue-400">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-blue-400">📖 About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-500 hover:underline">🚪 Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-full md:w-3/4 p-6 rounded-xl glass shadow">
            <form action="proses_add_artikel.php" method="post" class="space-y-6">
                <div>
                    <label for="nama_artikel" class="block text-sm font-medium mb-1 text-gray-300">Judul Artikel</label>
                    <input type="text" id="nama_artikel" name="nama_artikel" required
                        class="w-full p-3 border border-gray-600 rounded-md">
                </div>
                <div>
                    <label for="isi_artikel" class="block text-sm font-medium mb-1 text-gray-300">Isi Artikel</label>
                    <textarea id="isi_artikel" name="isi_artikel" rows="6" required
                        class="w-full p-3 border border-gray-600 rounded-md"></textarea>
                </div>
                <div class="flex justify-end gap-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition">💾 Simpan</button>
                    <a href="data_artikel.php"
                        class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded-md transition">❌ Batal</a>
                </div>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4 mt-10 border-t border-gray-800">
        &copy; <?php echo date('Y'); ?> | Created by <span class="text-blue-500 font-semibold">rhestaalfiansyah</span>
    </footer>
</body>

</html>
