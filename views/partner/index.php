<?php
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), "/\\");
if ($base === '/' || $base === '.' || $base === '') {
  $base = '';
}
$isLogin = isset($_SESSION['user']);
$title  = $title ?? 'Partner With Us - Lapanganin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- NAVBAR -->
  <header class="bg-white/90 backdrop-blur sticky top-0 z-50 border-b">
    <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
      <a href="<?= $base ?>/" class="flex items-center gap-2">
        <img src="<?= $base ?>/assets/img/logo-lapanganin.png" alt="Lapanganin" class="w-16 h-16 object-contain">
        <span class="font-semibold text-lg">Lapanganin</span>
      </a>

      <div class="hidden sm:flex items-center gap-8 text-sm">
        <a href="<?= $base ?>/" class="hover:text-emerald-700">
          Sewa Lapangan
        </a>
        <a href="<?= $base ?>/partner" class="text-emerald-700 font-semibold relative pb-1">
          Partner With Us
          <span class="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-8 h-0.5 bg-emerald-700 rounded-full"></span>
        </a>
        <a href="<?= $base ?>/venue" class="hover:text-emerald-700">
          Venue
        </a>
        <a href="<?= $base ?>/jadwal" class="hover:text-emerald-700">
          Jadwal Saya
        </a>
      </div>

      <div class="flex items-center gap-3">
        <a href="<?= $base ?>/profile" class="w-12 h-12 rounded-full border flex items-center justify-center hover:bg-gray-100">
          <i class="fa-regular fa-user text-sm"></i>
        </a>
      </div>
    </nav>
  </header>

  <!-- KONTEN -->
  <main class="bg-gray-50 min-h-screen">
    <section class="container mx-auto px-4 py-10 lg:py-16 space-y-16">

      <!-- SECTION 1: HERO + KERJASAMA -->
      <div>
        <!-- gambar besar atas -->
        <div class="w-full overflow-hidden rounded-3xl">
          <img
            src="<?= $base ?>/assets/img/foto-atlit.jpg"
            alt="Tim olahraga yang bekerjasama dengan Lapanganin"
            class="w-full h-full object-cover"
          >
        </div>

        <!-- judul kiri, paragraf kanan -->
        <div class="mt-10 grid gap-8 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)]">
          <div>
            <p class="text-xs lg:text-sm font-semibold tracking-wide text-emerald-800 mb-2">
              KERJASAMA DENGAN LAPANGANIN
            </p>
            <h1 class="text-2xl lg:text-3xl xl:text-4xl font-extrabold leading-snug">
              Sistem Booking Inovatif, Promosi Eksklusif. Perkuat Branding
              Lapangan Anda Bersama Lapanganin.
            </h1>
          </div>

          <div class="text-sm lg:text-base text-gray-600 leading-relaxed">
            <p class="mb-3">
              Lapanganin menawarkan sebuah platform yang menggabungkan Sistem Booking inovatif untuk
              pengelolaan jadwal yang efisien dan modern, serta layanan Promosi eksklusif yang menargetkan
              komunitas olahraga lokal di sekitar venue Anda.
            </p>
            <p>
              Dengan bergabung, pemilik venue dapat memperkuat branding Lapangan Anda untuk meningkatkan
              visibilitas, kepercayaan pelanggan, dan pada akhirnya mendorong tingkat okupansi dan pendapatan
              bisnis Anda.
            </p>
          </div>
        </div>
      </div>

      <!-- SECTION 2: ANALYTICS + TEKS KANAN -->
      <div class="grid gap-10 lg:grid-cols-2 items-center">
        <div class="bg-white rounded-3xl shadow-sm p-4 lg:p-6">
          <div class="w-full rounded-2xl overflow-hidden">
            <img
              src="<?= $base ?>/assets/img/foto-data-pwu.jpg"
              alt="Dashboard performa booking dan laporan venue"
              class="w-full h-full object-cover"
            >
          </div>
        </div>

        <div class="space-y-4">
          <h2 class="text-2xl lg:text-3xl font-extrabold leading-snug">
            Optimalkan operasional venue olahraga dengan platform
            manajemen yang efisien dan canggih.
          </h2>
          <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
            Website yang dirancang khusus untuk meningkatkan efisiensi dan penyewaan venue olahraga Anda.
          </p>
          <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
            Telah menjadi pilihan utama lebih dari 300+ venue olahraga di wilayah Jember dan sekitarnya.
          </p>
        </div>
      </div>

        <!-- SECTION 3: EVENT ACTIVATION + TELAH DIPERCAYA + CTA -->
        <div class="space-y-12">

        <!-- Teks kiri + trusted by kanan -->
        <div class="grid gap-10 lg:grid-cols-2 items-start">
            
            <!-- Kiri -->
            <div class="space-y-3">
            <p class="text-xs lg:text-sm font-semibold tracking-wide text-emerald-700">
                EVENT ACTIVATION
            </p>
            <h3 class="text-2xl lg:text-3xl font-extrabold leading-snug">
                Tingkatkan Brand Awareness Melalui Kolaborasi yang Menarik dan Interaktif.
            </h3>
            <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                Tingkatkan brand awareness Anda melalui kolaborasi bersama Lapanganin. Kami membantu brand Anda
                terlibat langsung dengan audiens, memperluas jangkauan, dan menciptakan pengalaman yang berkesan.
            </p>
            </div>

            <!-- Kanan: trusted by -->
            <div class="flex flex-col items-end space-y-3">
            <p class="text-xs lg:text-sm font-semibold tracking-wide text-emerald-700">
                TELAH DIPERCAYA OLEH
            </p>

            <img
                src="<?= $base ?>/assets/img/telah-dipercaya.png"
                alt="Logo partner"
                class="h-18 lg:h-20 object-contain"
            >
            </div>

        </div>
        <!-- CTA di bawah → geser ke kanan -->
        <div class="flex justify-end w-full">
            <div class="rounded-3xl bg-emerald-900 text-white px-6 py-4 lg:px-10 lg:py-5 flex items-center gap-6 shadow-md">
            <p class="text-base lg:text-lg font-semibold whitespace-nowrap">
                Butuh Informasi Lebih Lanjut?
            </p>

            <a
                href="https://wa.me/6281234567890?text=Halo%20Lapanganin%2C%20saya%20tertarik%20untuk%20kerjasama%20venue."
                class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white text-emerald-900 text-xs lg:text-sm font-medium hover:bg-emerald-50 whitespace-nowrap"
            >
                Hubungi Kami Sekarang
            </a>
            </div>
        </div>

        </div>

    </section>
  </main>

</body>
</html>
