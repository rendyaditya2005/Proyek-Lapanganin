<?php
// judul halaman
$title = 'Venue Lapangan - Lapanganin';

// mulai buffer konten
ob_start();

// data dummy 5 venue (nanti bisa kamu ganti sesuai homepage)
$venues = [
  [
    'name'    => 'Zona Futsal',
    'address' => 'Jl. Tidar No. 17, Jember, Jawa Timur.',
    'image'   => '/assets/img/futsal.jpg',
    'slug'    => 'zona-futsal',
    'rating'  => 4.00,
    'price'   => 30000,
  ],
  [
    'name'    => 'King Futsal',
    'address' => 'Jl. KH Shiddiq, Jember',
    'image'   => '/assets/img/futsal2.jpg',
    'slug'    => 'king-futsal',
    'rating'  => 5.00,
    'price'   => 30000,
  ],
  [
    'name'    => 'Lapangan 8',
    'address' => 'Jl. Teuku Umar Gg. 8 Tegal Besar Kulon, Tegal Besar, Jember, Jawa Timur.',
    'image'   => '/assets/img/badminton.jpg',
    'slug'    => 'lapangan8',
    'rating'  => 4.5,
    'price'   => 35000,
  ],
  [
    'name'    => 'Rush Badminton',
    'address' => 'Jl. Kalimantan Gg. 14, Jember, Jawa Timur.',
    'image'   => '/assets/img/rush.jpg',
    'slug'    => 'rush-badminton',
    'rating'  => 5.00,
    'price'   => 35000,
    
  ],
];
?>

<section class="max-w-6xl mx-auto px-4 py-10">

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <?php foreach ($venues as $venue): ?>
      <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="h-44 w-full overflow-hidden">
          <img
            src="<?= htmlspecialchars($venue['image']) ?>"
            alt="<?= htmlspecialchars($venue['name']) ?>"
            class="w-full h-full object-cover"
          >
        </div>

        <div class="p-4 space-y-2">
          <p class="text-xs text-gray-500">Venue</p>

          <h2 class="text-base font-semibold leading-snug">
            <?= htmlspecialchars($venue['name']) ?>
          </h2>

          <p class="text-xs flex items-center gap-1 text-gray-600">
            <i class="fa-solid fa-star text-yellow-500"></i>
            <?= htmlspecialchars($venue['rating']) ?> • Jember
          </p>

          <p class="text-sm font-medium text-gray-800">
            Mulai Rp<?= number_format($venue['price'], 0, ',', '.') ?> /sesi
          </p>

          <a
            href="<?= $base ?>/venue/<?= urlencode($venue['slug']) ?>"
            class="inline-block mt-2 text-sm font-semibold text-emerald-700 hover:underline"
          >
            Lihat Detail
          </a>
        </div>

      </article>
    <?php endforeach; ?>

  </div>

</section>

<?php
// ambil isi buffer dan kirim ke base.php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
