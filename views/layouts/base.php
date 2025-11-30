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
<!-- NAVBAR -->
<header class="bg-white/90 backdrop-blur sticky top-0 z-50 border-b">
  <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
    
    <?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $isLogin = isset($_SESSION['user']);
    ?>

    <!-- LOGO -->
    <a href="<?= $base ?>/" class="flex items-center gap-2">
      <img src="<?= $base ?>/assets/img/logo-lapanganin.png" class="w-16 h-16 object-contain">
      <span class="font-semibold text-lg">Lapanganin</span>
    </a>

    <!-- MENU -->
    <div class="hidden sm:flex items-center gap-8 text-sm">
      <a href="<?= $base ?>/" class="relative hover:text-emerald-700">
        Sewa Lapangan
        <?php if ($path === '/' || $path === ''): ?>
          <span class="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-8 h-0.5 bg-emerald-700 rounded-full"></span>
        <?php endif; ?>
      </a>

      <a href="<?= $base ?>/partner" class="relative hover:text-emerald-700">
        Partner With Us
        <?php if (str_starts_with($path, '/partner')): ?>
          <span class="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-8 h-0.5 bg-emerald-700 rounded-full"></span>
        <?php endif; ?>
      </a>

      <a href="<?= $base ?>/venue" class="relative hover:text-emerald-700">
        Venue
        <?php if (str_starts_with($path, '/venue')): ?>
          <span class="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-8 h-0.5 bg-emerald-700 rounded-full"></span>
        <?php endif; ?>
      </a>

      <a href="<?= $base ?>/jadwal" class="relative hover:text-emerald-700">
        Jadwal Saya
        <?php if (str_starts_with($path, '/jadwal')): ?>
          <span class="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-8 h-0.5 bg-emerald-700 rounded-full"></span>
        <?php endif; ?>
      </a>
    </div>

    <!-- RIGHT MENU -->
    <?php if ($isLogin): ?>
      <a href="<?= $base ?>/profile"
         class="w-12 h-12 rounded-full border flex items-center justify-center hover:bg-gray-100">
        <i class="fa-regular fa-user text-sm"></i>
      </a>
    <?php else: ?>
      <div class="flex items-center gap-3">
        <a href="<?= $base ?>/login" class="text-sm hover:text-emerald-700">
          Masuk
        </a>
        <a href="<?= $base ?>/register"
           class="text-sm bg-emerald-700 text-white px-4 py-2 rounded-lg hover:bg-emerald-800">
          Daftar
        </a>
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
