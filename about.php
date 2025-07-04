<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About | Personal Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        primary: '#0f172a',
                        secondary: '#1e293b',
                        accent: '#38bdf8',
                        light: '#f1f5f9',
                        glow: '#94a3b8'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-primary text-light font-sans">
    <!-- Header -->
    <header class="bg-secondary text-accent text-center p-8 text-3xl font-bold shadow-lg shadow-accent/20">
        <h1 class="animate-pulse">About Me | Rhestaalfiansyah</h1>
    </header>

    <!-- Navigation -->
    <nav class="bg-black/60 backdrop-blur-sm text-light py-4 shadow-md sticky top-0 z-50">
        <ul class="flex justify-center space-x-10 font-semibold text-lg">
            <li><a href="index.php" class="hover:text-accent transition">Artikel</a></li>
            <li><a href="gallery.php" class="hover:text-accent transition">Gallery</a></li>
            <li><a href="about.php" class="text-accent font-bold underline underline-offset-4">About</a></li>
            <li><a href="admin/login.php" class="hover:text-accent transition">Login</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto p-6 mt-10 bg-secondary rounded-lg shadow-lg shadow-black/30">
        <h2 class="text-2xl font-bold mb-6 text-accent border-b border-accent pb-2">Tentang Saya</h2>
        <div class="space-y-6 leading-relaxed text-gray-300">
            <?php
            $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
            $query = mysqli_query($db, $sql);
            while ($data = mysqli_fetch_array($query)) {
                echo "<div class='bg-black/30 p-4 rounded-lg hover:bg-black/50 transition'>";
                echo "<p class='text-glow'>" . nl2br(htmlspecialchars($data['about'])) . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 text-center py-6 mt-14 border-t border-gray-700">
        &copy; <?php echo date('Y'); ?> | Created by <span class="text-accent">Rhestaalfiansyah</span>
    </footer>
</body>

</html>
