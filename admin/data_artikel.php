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
    <title>Kelola Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
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

        .hover-glow:hover {
            box-shadow: 0 0 10px #38bdf8, 0 0 20px #38bdf8;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black text-white dark:text-white light:bg-gray-100 light:text-gray-900 min-h-screen transition duration-300">
    <!-- Header -->
    <header class="bg-black bg-opacity-90 dark:bg-black light:bg-white text-cyan-400 py-6 shadow-lg text-center relative">
        <h1 class="text-3xl font-extrabold tracking-wider uppercase">// HALAMAN ADMIN //</h1>
        <button id="toggleMode" class="absolute right-6 top-6 bg-cyan-500 text-white px-4 py-2 rounded-full shadow hover:bg-cyan-600 transition text-sm">
            🌗 Ganti Mode
        </button>
    </header>

    <!-- Container -->
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto mt-10 px-6 gap-6">
        <!-- Sidebar -->
        <aside class="lg:w-1/4 w-full glass p-6 rounded-xl text-white light:text-black">
            <h2 class="text-xl font-bold text-cyan-300 text-center mb-4">≡ MENU</h2>
            <ul class="space-y-2 text-sm">
                <li><a href="beranda_admin.php" class="block hover:text-cyan-300 hover-glow">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block font-semibold text-cyan-200 hover-glow">📝 Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-cyan-300 hover-glow">🖼️ Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-cyan-300 hover-glow">ℹ️ About</a></li>
                <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                       class="block text-red-500 hover:text-red-400 font-semibold hover:underline mt-4">🚪 Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="lg:w-3/4 w-full glass p-6 rounded-xl overflow-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-cyan-300">📑 Daftar Artikel</h2>
                <a href="add_artikel.php" class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-600 transition hover-glow font-medium">+ Tambah Artikel</a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300 text-sm text-white light:text-black">
                    <thead class="bg-cyan-600 text-white">
                        <tr>
                            <th class="p-3 border">No</th>
                            <th class="p-3 border">Nama Artikel</th>
                            <th class="p-3 border">Isi Artikel</th>
                            <th class="p-3 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="dark:bg-gray-800 light:bg-white">
                        <?php
                        $sql = "SELECT * FROM tbl_artikel";
                        $query = mysqli_query($db, $sql);
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<tr class='even:bg-gray-700 light:even:bg-gray-100'>";
                            echo "<td class='border p-2 text-center'>" . $no++ . "</td>";
                            echo "<td class='border p-2'>" . htmlspecialchars($data['nama_artikel']) . "</td>";
                            echo "<td class='border p-2'>" . htmlspecialchars($data['isi_artikel']) . "</td>";
                            echo "<td class='border p-2 text-center space-x-2'>
                                <a href='edit_artikel.php?id_artikel={$data['id_artikel']}' class='text-cyan-400 hover:underline hover-glow'>Edit</a>
                                <a href='delete_artikel.php?id_artikel={$data['id_artikel']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-500 hover:underline hover-glow'>Hapus</a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-90 text-center py-4 mt-10 text-cyan-400 text-sm dark:bg-black light:bg-white light:text-gray-700">
        &copy; <?php echo date('Y'); ?> | Created by rhestaalfiansyah
    </footer>

    <!-- Toggle Mode Script -->
    <script>
        const toggleButton = document.getElementById('toggleMode');
        const htmlEl = document.documentElement;

        // Set initial theme
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
