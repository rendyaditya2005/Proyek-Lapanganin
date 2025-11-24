<?php
// judul halaman
$title = 'Jadwal Saya - Lapanganin';

// mulai buffer konten
ob_start();

// data dummy dulu, nanti bisa kamu ganti dari database
$orders = [
  [
    'venue'      => 'Lapangan 8',
    'qty'        => 2,
    'status'     => 'Done',
    'total'      => 70000,
    'status_tag' => 'done',
  ],
  [
    'venue'      => 'Lapangan 8',
    'qty'        => 2,
    'status'     => 'Active',
    'total'      => 70000,
    'status_tag' => 'active',
  ],
];
?>

<section class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Jadwal Saya</h1>

  <!-- TAB FILTER -->
  <div class="bg-gray-100 rounded-3xl p-6">
    <div class="flex gap-6 text-sm mb-4 border-b border-gray-200 pb-3">
      <button class="font-semibold text-emerald-900 border-b-2 border-emerald-900 pb-1">
        All Order
      </button>
      <button class="text-gray-500">
        Pending
      </button>
      <button class="text-gray-500">
        Completed
      </button>
    </div>

    <!-- HEADER TABEL -->
    <div class="rounded-2xl overflow-hidden">
      <div class="grid grid-cols-[2.5fr_1fr_1fr_auto] text-sm font-semibold text-white bg-emerald-900 px-6 py-3">
        <p>Venue</p>
        <p>Status</p>
        <p>Total</p>
        <p class="text-right">Detail</p>
      </div>

      <!-- LIST ORDER -->
      <div class="bg-gray-100">
        <?php foreach ($orders as $order): ?>
          <div class="grid grid-cols-[2.5fr_1fr_1fr_auto] items-center px-6 py-4 border-t border-gray-200 text-sm">
            <!-- VENUE + LOGO -->
            <div class="flex items-center gap-3">
              <div class="w-12 h-12 rounded-md overflow-hidden bg-gray-200 flex items-center justify-center">
                <!-- pakai gambar beneran kalau sudah ada -->
                <img
                  src="/assets/img/badminton.jpg"
                  alt="Padel Jember"
                  class="w-full h-full object-cover"
                >
              </div>
              <div>
                <p class="font-semibold"><?= htmlspecialchars($order['venue']) ?></p>
                <p class="text-xs text-gray-500">Qty: <?= (int) $order['qty'] ?></p>
              </div>
            </div>

            <!-- STATUS -->
            <div>
              <?php
                $statusClass = $order['status_tag'] === 'done'
                  ? 'text-emerald-500'
                  : 'text-gray-800';
              ?>
              <p class="font-semibold <?= $statusClass ?>">
                <?= htmlspecialchars($order['status']) ?>
              </p>
            </div>

            <!-- TOTAL -->
            <div>
              <p class="font-semibold">
                Rp<?= number_format($order['total'], 0, ',', '.') ?>
              </p>
            </div>

            <!-- BUTTON DETAIL -->
            <div class="text-right">
              <a
                href="#"
                class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-900 text-white text-xs font-medium hover:bg-emerald-800"
              >
                Order Detail
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<?php
// ambil isi buffer dan kirim ke base layout
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
