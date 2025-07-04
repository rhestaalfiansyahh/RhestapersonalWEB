<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
$id = $_GET['id_artikel'];
$sql = "SELECT * FROM tbl_artikel WHERE id_artikel = '$id'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass {
            backdrop-filter: blur(12px);
            background-color: rgba(24, 24, 24, 0.6);
        }

        .neon-border {
            border: 2px solid #00f0ff;
            box-shadow: 0 0 10px #00f0ff, 0 0 20px #00f0ff inset;
        }

        .hover-glow:hover {
            box-shadow: 0 0 10px #00f0ff, 0 0 20px #00f0ff;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black text-white min-h-screen">
    <!-- Header -->
    <header class="bg-black bg-opacity-90 text-cyan-400 text-center py-6 shadow-lg">
        <h1 class="text-3xl font-extrabold tracking-wide uppercase">Edit Artikel</h1>
    </header>

    <!-- Container -->
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto mt-10 px-6 gap-6">
        <!-- Sidebar -->
        <aside class="lg:w-1/4 w-full glass neon-border p-6 rounded-xl">
            <h2 class="text-xl font-bold text-cyan-300 text-center mb-6">≡ MENU</h2>
            <ul class="space-y-4 text-sm">
                <li><a href="beranda_admin.php" class="block hover:text-cyan-300 hover-glow">🏠 Beranda</a></li>
                <li><a href="data_artikel.php" class="block font-semibold text-cyan-200 hover-glow">📝 Kelola Artikel</a></li>
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
            <form action="proses_edit_artikel.php" method="post" class="space-y-6">
                <input type="hidden" name="id_artikel" value="<?php echo $data['id_artikel']; ?>">

                <div>
                    <label for="nama_artikel" class="block text-sm font-semibold text-cyan-300 mb-2">Judul Artikel</label>
                    <input type="text" id="nama_artikel" name="nama_artikel" required
                        value="<?php echo htmlspecialchars($data['nama_artikel']); ?>"
                        class="w-full px-4 py-2 bg-gray-900 text-white border border-cyan-500 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div>

                <div>
                    <label for="isi_artikel" class="block text-sm font-semibold text-cyan-300 mb-2">Isi Artikel</label>
                    <textarea id="isi_artikel" name="isi_artikel" rows="8" required
                        class="w-full px-4 py-2 bg-gray-900 text-white border border-cyan-500 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400"><?php echo htmlspecialchars($data['isi_artikel']); ?></textarea>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit"
                        class="bg-cyan-500 text-white px-6 py-2 rounded-md hover:bg-cyan-600 transition hover-glow font-medium">💾 Update</button>
                    <a href="data_artikel.php"
                        class="bg-gray-600 text-white px-6 py-2 rounded-md hover:bg-gray-500 transition font-medium">❌ Batal</a>
                </div>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-90 text-center py-4 mt-10 text-cyan-400 text-sm">
        &copy; <?php echo date('Y'); ?> | Created by rhestaalfiansyah
    </footer>
</body>

</html>
