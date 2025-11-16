<?php
// pastikan variabel $base sudah ada
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna - Lapanganin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .checkerboard {
      background-image:
        linear-gradient(45deg, #e5e7eb 25%, transparent 25%),
        linear-gradient(-45deg, #e5e7eb 25%, transparent 25%),
        linear-gradient(45deg, transparent 75%, #e5e7eb 75%),
        linear-gradient(-45deg, transparent 75%, #e5e7eb 75%);
      background-size: 24px 24px;
      background-position: 0 0, 0 12px, 12px -12px, -12px 0px;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

<header class="bg-white/90 backdrop-blur sticky top-0 z-50 border-b">
  <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
    <!-- logo kiri -->
    <a href="<?= $base ?>/" class="flex items-center gap-2">
      <img src="/assets/img/logo-lapanganin.png" alt="Lapanganin" class="w-16 h-16 object-contain">
      <span class="font-semibold text-lg">Lapanganin</span>
    </a>

    <!-- menu tengah -->
    <div class="hidden md:flex items-center gap-10 text-sm">
      <a href="<?= $base ?>/sewa-lapangan" class="hover:text-emerald-700">Sewa Lapangan</a>
      <a href="<?= $base ?>/partner" class="hover:text-emerald-700">Partner With Us</a>
      <a href="<?= $base ?>/venue" class="hover:text-emerald-700">Venue</a>
      <a href="<?= $base ?>/jadwal-saya" class="hover:text-emerald-700">Jadwal Saya</a>
    </div>

    <!-- profile kanan -->
    <div class="flex items-center gap-2">
      <button class="w-11 h-11 rounded-full border border-gray-300 flex items-center justify-center">
        <i class="fa-regular fa-user text-lg"></i>
      </button>
    </div>
  </nav>
</header>


<main class="max-w-6xl mx-auto px-4 lg:px-6 py-10">
  <div class="flex flex-col lg:flex-row gap-8">

    <aside class="w-full lg:w-1/3">
      <div class="bg-[#244734] text-white rounded-[40px] p-8 flex flex-col items-center">

        <div class="w-40 h-40 rounded-full checkerboard mb-8 overflow-hidden"></div>

        <div class="w-full space-y-4 text-sm">
          <button class="w-full flex items-center gap-3 bg-white text-[#244734] rounded-full px-5 py-3 font-semibold">
            <i class="fa-regular fa-user"></i>
            <span>Informasi Pengguna</span>
          </button>

          <button class="w-full flex items-center gap-3 bg-white text-[#244734] rounded-full px-5 py-3">
            <i class="fa-regular fa-calendar"></i>
            <span>Jadwal Saya</span>
          </button>

          <button class="w-full flex items-center gap-3 bg-white text-[#244734] rounded-full px-5 py-3">
            <i class="fa-solid fa-lock"></i>
            <span>Login &amp; Password</span>
          </button>

          <button class="w-full flex items-center gap-3 bg-white text-[#244734] rounded-full px-5 py-3">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </button>
        </div>
      </div>
    </aside>

    <section class="flex-1">
      <div class="bg-[#244734] text-white rounded-[40px] p-8 md:p-10">
        <h1 class="text-2xl md:text-3xl font-semibold mb-8">Informasi Pengguna</h1>

        <form class="space-y-6">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm mb-2">First Name</label>
              <input type="text" class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
            </div>
            <div>
              <label class="block text-sm mb-2">Last Name</label>
              <input type="text" class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
            </div>
          </div>

          <div>
            <label class="block text-sm mb-2">Email</label>
            <input type="email" class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
          </div>

          <div>
            <label class="block text-sm mb-2">No Telephone</label>
            <input type="text" class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
          </div>

          <div class="flex justify-end gap-4 pt-6">
            <button type="reset" class="rounded-full px-8 py-3 bg-white text-[#244734] font-semibold">
              Batal
            </button>
            <button type="button" class="rounded-full px-8 py-3 bg-white text-[#244734] font-semibold">
              Simpan
            </button>
          </div>

        </form>
      </div>
    </section>

  </div>
</main>

</body>
</html>
