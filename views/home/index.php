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

<section class="max-w-6xl mx-auto px-4 py-10 grid gap-6 md:grid-cols-3">
  <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
    <img src="/assets/img/card-padel-1.jpg" class="w-full h-44 object-cover" alt="">
    <div class="p-4 text-sm">
      <p class="text-gray-500">Venue</p>
      <h3 class="font-semibold text-lg">Padel Co.</h3>
      <p class="text-gray-500 mt-1">⭐ 4.12 • Kota Bandung</p>
      <p class="mt-3 text-gray-500 line-through text-xs">Rp260.000</p>
      <p class="font-semibold">Mulai Rp250.000 <span class="text-gray-400 text-xs">/sesi</span></p>
    </div>
  </article>

  <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
    <img src="/assets/img/card-padel-2.jpg" class="w-full h-44 object-cover" alt="">
    <div class="p-4 text-sm">
      <p class="text-gray-500">Venue</p>
      <h3 class="font-semibold text-lg">Papadelulu Padel Club</h3>
      <p class="text-gray-500 mt-1">⭐ 4.87 • Kota Bandung</p>
      <p class="font-semibold mt-2">Mulai Rp250.000 <span class="text-gray-400 text-xs">/sesi</span></p>
    </div>
  </article>

  <article class="bg-white rounded-2xl border shadow-sm overflow-hidden">
    <img src="/assets/img/card-padel-3.jpg" class="w-full h-44 object-cover" alt="">
    <div class="p-4 text-sm">
      <p class="text-gray-500">Venue</p>
      <h3 class="font-semibold text-lg">Joglo Padel Club</h3>
      <p class="text-gray-500 mt-1">⭐ 4.98 • Kota Yogyakarta</p>
      <p class="text-gray-500 line-through text-xs mt-3">Rp360.000</p>
      <p class="font-semibold">Mulai Rp150.000 <span class="text-gray-400 text-xs">/sesi</span></p>
    </div>
  </article>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
