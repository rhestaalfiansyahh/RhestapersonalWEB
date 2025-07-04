<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Web | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        primary: '#0f172a',
                        secondary: '#1e293b',
                        accent: '#38bdf8',
                        glow: '#94a3b8'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-primary text-white font-sans">
    <!-- Header -->
    <header class="bg-secondary text-accent text-center p-8 text-3xl font-bold shadow-lg shadow-accent/20">
        <h1 class="animate-pulse">Personal Web | Rhestaalfiansyah</h1>
    </header>

    <!-- Navigation -->
    <nav class="bg-black/60 backdrop-blur text-gray-300 py-4 shadow-md sticky top-0 z-50">
        <ul class="flex justify-center space-x-10 font-medium text-lg">
            <li><a href="index.php" class="text-accent font-bold underline underline-offset-4">Artikel</a></li>
            <li><a href="gallery.php" class="hover:text-accent transition">Gallery</a></li>
            <li><a href="about.php" class="hover:text-accent transition">About</a></li>
            <li><a href="admin/login.php" class="hover:text-accent transition">Login</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
        <!-- Artikel Utama -->
        <section class="md:col-span-2 bg-secondary p-6 rounded-lg shadow-lg shadow-black/50">
            <h2 class="text-2xl font-bold mb-6 text-accent border-b border-accent pb-2">Artikel Terbaru</h2>
            <div class="space-y-6">
                <?php
                $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<div class='border-b border-gray-700 pb-4'>";
                    echo "<h3 class='text-lg font-semibold text-accent'>" . htmlspecialchars($data['nama_artikel']) . "</h3>";
                    echo "<p class='text-glow text-gray-300 mt-2'>" . htmlspecialchars($data['isi_artikel']) . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-secondary p-6 rounded-lg shadow-lg shadow-black/50">
            <h2 class="text-xl font-semibold text-accent mb-4 border-b border-accent pb-2">Daftar Artikel</h2>
            <ul class="space-y-3 list-disc list-inside text-gray-300">
                <?php
                $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<li class='hover:text-accent transition'>" . htmlspecialchars($data['nama_artikel']) . "</li>";
                }
                ?>
            </ul>
        </aside>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 text-center py-6 mt-14 border-t border-gray-700">
        &copy; <?php echo date('Y'); ?> | Created by <span class="text-accent">Rhestaalfiansyah</span>
    </footer>
</body>

</html>
