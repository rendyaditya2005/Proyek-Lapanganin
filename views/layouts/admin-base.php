<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), "/\\");
if ($base === '/' || $base === '.' || $base === '') {
  $base = '';
}

if (
  !isset($_SESSION['user']) ||
  ( $_SESSION['user']['role'] ?? '' ) !== 'admin'
) {
  header('Location: ' . $base . '/login');
  exit;
}

$adminName      = $_SESSION['user']['name'] ?? 'Admin';
$adminPageTitle = $adminPageTitle ?? ($title ?? 'Admin - Lapanganin');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title ?? 'Lapanganin Admin') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Inter',sans-serif}</style>
</head>
<body class="bg-gray-100 text-gray-800">

<header class="bg-white border-b">
  <nav class="max-w-6xl mx-auto px-4 py-3 flex items-center">
    <!-- kiri: logo -->
    <div class="flex items-center gap-2">
      <a href="<?= $base ?>/admin" class="flex items-center gap-2">
        <img src="<?= $base ?>/assets/img/logo-lapanganin.png"
             alt="Lapanganin" class="w-14 h-14 object-contain">
        <span class="font-semibold text-lg">Lapanganin</span>
      </a>
    </div>

    <!-- tengah: judul SELALU Homepage -->
    <div class="flex-1 flex justify-center -ml-10">
      <div class="flex flex-col items-center gap-1">
        <span class="text-sm font-medium text-gray-800">
          Homepage
        </span>
        <span class="w-8 h-0.5 bg-gray-800 rounded-full"></span>
      </div>
    </div>

    <!-- kanan: icon user -->
    <div class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center">
      <i class="fa-regular fa-user text-sm"></i>
    </div>
  </nav>
</header>

<main class="py-6">
  <?= $content ?? '' ?>
</main>

</body>
</html>
