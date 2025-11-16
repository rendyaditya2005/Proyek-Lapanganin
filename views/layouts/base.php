<?php
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), "/\\");
if ($base === '/' || $base === '.' || $base === '') { $base = ''; }
$isLogin = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Lapanganin - Sewa Lapangan Jember' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Inter',sans-serif}</style>
</head>

<body class="bg-gray-50 text-gray-800">
  <header class="bg-white/90 backdrop-blur sticky top-0 z-50 border-b">
    <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
      <a href="<?= $base ?>/" class="flex items-center gap-2">
        <img src="/assets/img/logo-lapanganin.png" alt="Lapanganin" class="w-16 h-16 object-contain">
        <span class="font-semibold text-lg">Lapanganin</span>
      </a>

      <ul class="hidden md:flex items-center gap-8 text-gray-700 text-sm">
        <li><a href="<?= $base ?>/" class="hover:text-[#2f5d4d]">Sewa Lapangan</a></li>
        <li><a href="<?= $base ?>/partner" class="hover:text-[#2f5d4d]">Partner With Us</a></li>
        <li><a href="<?= $base ?>/venue" class="hover:text-[#2f5d4d]">Venue</a></li>
        <li><a href="<?= $base ?>/jadwal" class="hover:text-[#2f5d4d]">Jadwal Saya</a></li>
      </ul>

      <?php if ($isLogin): ?>
        <div class="relative">
          <button id="userBtn" class="flex items-center gap-2 border rounded-full px-3 py-1.5 hover:bg-gray-50">
            <div class="flex items-center space-x-2">
              <i class="fa-solid fa-user-circle text-2xl text-gray-700"></i>
              <span class="hidden sm:inline text-sm"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?></span>
            </div>
            <i class="fa-solid fa-chevron-down text-xs"></i>
          </button>

          <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg border hidden">
            <a href="<?= $base ?>/profile" class="block px-4 py-2 text-sm hover:bg-gray-50">Profil</a>
            <a href="<?= $base ?>/dashboard" class="block px-4 py-2 text-sm hover:bg-gray-50">Dashboard</a>
            <a href="<?= $base ?>/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Keluar</a>
          </div>
        </div>

        <script>
          const btn = document.getElementById('userBtn');
          const menu = document.getElementById('userMenu');
          btn?.addEventListener('click', () => menu.classList.toggle('hidden'));
          document.addEventListener('click', e => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) menu.classList.add('hidden');
          });
        </script>
      <?php else: ?>
        <div class="flex items-center gap-3">
          <a href="<?= $base ?>/login" class="text-sm text-gray-700 hover:text-[#2f5d4d]">Masuk</a>
          <a href="<?= $base ?>/register" class="text-sm bg-[#2f5d4d] text-white px-4 py-2 rounded-lg">Daftar</a>
        </div>
      <?php endif; ?>
    </nav>
  </header>

  <main class="max-w-7xl mx-auto px-4 py-6">
    <?= $content ?? '' ?>
  </main>

  <script>window.BASE_PATH = <?= json_encode($base) ?>;</script>
  <script src="<?= $base ?>/js/home.js?v=1" defer></script>
</body>
</html>
