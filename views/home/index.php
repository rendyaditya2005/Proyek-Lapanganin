<?php
$title = 'Sewa Lapangan - Lapanganin';
ob_start();
?>
<section class="bg-[#2f5d4d] text-white">
  <div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl md:text-5xl font-extrabold">Temukan & Sewa Lapangan Olahraga</h1>
    <p class="mt-3 text-white/80">Pilih venue terbaik di Jember untuk futsal, badminton, basket, dan lainnya.</p>

    <div class="mt-8 bg-white text-gray-800 rounded-2xl shadow p-4 flex flex-col md:flex-row gap-3">
      <button class="border rounded-lg px-4 py-2 flex-1 text-left">Pilih Kecamatan</button>
      <button class="border rounded-lg px-4 py-2 flex-1 text-left">Pilih Kategori Olahraga</button>
      <button class="border rounded-lg px-4 py-2 flex-1 text-left">Urutkan Berdasarkan</button>
      <a href="#" class="bg-[#2f5d4d] text-white px-5 py-2 rounded-lg self-stretch flex items-center justify-center">Cari Venue</a>
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-10">
  <a href="<?= $base ?>/venue/zona-futsal" class="block">
  <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
        <img src="/assets/img/futsal2.jpg" class="w-full h-44 object-cover" alt="">
        <div class="p-4 text-sm">
          <p class="text-gray-500">Venue</p>
          <h3 class="font-semibold text-lg">Zona Futsal</h3>
          <p class="text-gray-500 mt-1">⭐ 4.00 • Jember</p>
          <p class="font-semibold mt-2">
            Mulai Rp30.000 <span class="text-gray-700 text-xs">/sesi</span></p>
        </div>
      </article>
  </a>

    <a href="<?= $base ?>/venue/lapangan8" class="block">
    <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
      <img src="/assets/img/badminton.jpg" class="w-full h-44 object-cover" alt="">
      <div class="p-4 text-sm">
        <p class="text-gray-500">Venue</p>
        <h3 class="font-semibold text-lg">Lapangan 8</h3>
        <p class="text-gray-500 mt-1">⭐ 4.5 • Jember</p>
        <p class="font-semibold mt-2">
          Mulai Rp35.000 <span class="text-gray-700 text-xs">/sesi</span></p>
      </div>
    </article>
  </a>

  <a href="<?= $base ?>/venue/king-futsal" class="block">
    <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
      <img src="/assets/img/futsal.jpg" class="w-full h-44 object-cover" alt="">
      <div class="p-4 text-sm">
        <p class="text-gray-500">Venue</p>
        <h3 class="font-semibold text-lg">King Futsal</h3>
        <p class="text-gray-500 mt-1">⭐ 5.00 • Jember</p>
        <p class="font-semibold mt-2">
          Mulai Rp30.000 <span class="text-gray-700 text-xs">/sesi</span>
        </p>
      </div>
    </article>
  </a>

    <a href="<?= $base ?>/venue/rush-badminton" class="block">
      <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
      <img src="/assets/img/rush.jpg" class="w-full h-44 object-cover" alt="">
      <div class="p-4 text-sm">
        <p class="text-gray-500">Venue</p>
        <h3 class="font-semibold text-lg">Rush Badminton</h3>
        <p class="text-gray-500 mt-1">⭐ 5.00 • Jember</p>
        <p class="font-semibold mt-2">
          Mulai Rp35.000 <span class="text-gray-700 text-xs">/sesi</span>
        </p>
      </div>
    </article>
    </a>
  </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
