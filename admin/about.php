<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <title>Kelola About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Tailwind config: enable dark mode with class strategy
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        .glass {
            backdrop-filter: blur(10px);
            background-color: rgba(24, 24, 24, 0.6);
        }

        .light .glass {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .neon-border {
            border: 2px solid #00f0ff;
            box-shadow: 0 0 10px #00f0ff, 0 0 20px #00f0ff inset;
        }

        .hover-glow:hover {
            box-shadow: 0 0 10px #00f0ff, 0 0 25px #00f0ff;
        }

        .mode-toggle {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black text-white dark:text-white light:bg-gray-100 light:text-gray-800 min-h-screen transition-colors duration-300" id="pageBody">
    <!-- Header -->
    <header class="bg-black bg-opacity-90 dark:bg-black light:bg-white text-cyan-400 text-center py-6 shadow-lg flex justify-between items-center px-6">
        <h1 class="text-3xl font-extrabold tracking-wider uppercase">Kelola Halaman About</h1>
        <!-- Toggle -->
        <button id="toggleMode" class="bg-cyan-500 text-white px-4 py-2 rounded-full shadow hover:bg-cyan-600 transition mode-toggle text-sm font-medium">
            🌗 Ganti Mode
        </button>
    </header>

    <!-- Container -->
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto mt-10 px-6 gap-6">
        <!-- Sidebar -->
        <aside class="lg:w-1/4 w-full glass neon-border p-6 rounded-xl">
            <h2 class="text-xl font-bold text-cyan-300 text-center mb-6">≡ MENU</h2>
            <ul class="space-y-4 text-sm">
                <li><a href="beranda_admin.php" class="block hover:text-cyan-300 hover-glow">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-cyan-300 hover-glow">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-cyan-300 hover-glow">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block font-semibold text-cyan-200 hover-glow">ℹ️ About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-500 hover:text-red-400 font-semibold hover:underline mt-4">🚪 Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="lg:w-3/4 w-full glass neon-border p-8 rounded-xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-cyan-300">Tentang Saya</h2>
                <a href="add_about.php"
                    class="bg-cyan-500 text-white px-4 py-2 rounded-md hover:bg-cyan-600 transition hover-glow font-medium">+ Tambah Data</a>
            </div>

            <div class="space-y-6">
                <?php
                $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<div class='p-5 bg-gray-900 dark:bg-gray-900 light:bg-white border border-cyan-500 rounded-lg shadow'>";
                    echo "<p class='mb-4 text-gray-200 light:text-gray-800'>" . htmlspecialchars($data['about']) . "</p>";
                    echo "<div class='flex space-x-4 text-sm'>";
                    echo "<a href='edit_about.php?id_about={$data['id_about']}' class='text-cyan-400 hover:text-cyan-300 underline hover-glow'>Edit</a>";
                    echo "<a href='delete_about.php?id_about={$data['id_about']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-500 hover:text-red-400 underline hover-glow'>Hapus</a>";
                    echo "</div></div>";
                }
                ?>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-90 text-center py-4 mt-10 text-cyan-400 text-sm dark:bg-black light:bg-white">
        &copy; <?php echo date('Y'); ?> | Created by rhestaalfiansyah
    </footer>

    <!-- Mode Script -->
    <script>
        const toggleButton = document.getElementById('toggleMode');
        const htmlEl = document.documentElement;

        // Check local storage on load
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
