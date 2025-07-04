<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

// Hitung total artikel & gallery
$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        .glass {
            backdrop-filter: blur(12px);
            background-color: rgba(24, 24, 24, 0.6);
        }

        .light .glass {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .neon-border {
            border: 2px solid #00f0ff;
            box-shadow: 0 0 10px #00f0ff, 0 0 20px #00f0ff inset;
        }

        .neon-green {
            border-color: #00ffb3;
            box-shadow: 0 0 10px #00ffb3, 0 0 20px #00ffb3 inset;
        }

        .hover-glow:hover {
            box-shadow: 0 0 10px #00f0ff, 0 0 25px #00f0ff;
        }

        .mode-toggle {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black dark:text-white light:bg-gray-100 light:text-gray-800 min-h-screen transition duration-300">
    <!-- Header -->
    <header class="bg-black bg-opacity-90 dark:bg-black light:bg-white text-cyan-400 py-6 shadow-lg text-center relative">
        <h1 class="text-3xl font-extrabold tracking-wider uppercase">Dashboard Admin</h1>
        <!-- Mode Toggle -->
        <button id="toggleMode" class="absolute right-6 top-6 bg-cyan-500 text-white px-4 py-2 rounded-full shadow hover:bg-cyan-600 transition mode-toggle text-sm">
            🌗 Ganti Mode
        </button>
    </header>

    <!-- Container -->
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto mt-10 px-6 gap-6">
        <!-- Sidebar -->
        <aside class="lg:w-1/4 w-full glass neon-border p-6 rounded-xl text-white light:text-black">
            <h2 class="text-2xl font-bold text-cyan-400 text-center mb-6">≡ MENU</h2>
            <ul class="space-y-4 text-sm">
                <li><a href="beranda_admin.php" class="block hover:text-cyan-300 hover-glow">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-cyan-300 hover-glow">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-cyan-300 hover-glow">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-cyan-300 hover-glow">ℹ️ About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-500 hover:text-red-400 font-semibold hover:underline mt-4">🚪 Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="lg:w-3/4 w-full glass neon-border p-8 rounded-xl">
            <div class="mb-6">
                <h2 class="text-2xl text-cyan-300 font-bold">Halo, <span class="text-white light:text-black"><?php echo $username; ?></span> 👋</h2>
                <p class="text-sm text-gray-400 light:text-gray-700 mt-1">Selamat datang kembali di panel admin.</p>
            </div>

            <!-- Info Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                <div class="bg-gray-900 light:bg-white p-6 rounded-lg border-t-4 border-cyan-400 neon-border text-center">
                    <h3 class="text-lg font-semibold text-cyan-300">Total Artikel</h3>
                    <p class="text-4xl font-bold text-white light:text-black mt-2"><?php echo $jumlah_artikel; ?></p>
                </div>
                <div class="bg-gray-900 light:bg-white p-6 rounded-lg border-t-4 border-green-400 neon-green text-center">
                    <h3 class="text-lg font-semibold text-green-300">Total Gallery</h3>
                    <p class="text-4xl font-bold text-white light:text-black mt-2"><?php echo $jumlah_gallery; ?></p>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-90 text-center py-4 mt-10 text-cyan-500 text-sm dark:bg-black light:bg-white light:text-gray-700">
        &copy; <?php echo date('Y'); ?> | Created by rhestaalfiansyah
    </footer>

    <!-- Toggle Mode Script -->
    <script>
        const toggleButton = document.getElementById('toggleMode');
        const htmlEl = document.documentElement;

        // Apply saved mode on load
        if (localStorage.getItem('theme') === 'light') {
            htmlEl.classList.remove('dark');
            htmlEl.classList.add('light');
        }

        toggleButton.addEventListener('click', () => {
            if (htmlEl.classList.contains('dark')) {
                htmlEl.classList.remove('dark');
                htmlEl.classList.add('light');
                localStorage.setItem('theme', 'light');
            } else {
                htmlEl.classList.remove('light');
                htmlEl.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>

</html>
