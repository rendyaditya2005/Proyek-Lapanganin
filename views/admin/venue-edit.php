<?php
$title          = 'Edit Venue - Admin';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), "/\\");
if ($base === '/' || $base === '.' || $base === '') $base = '';

if (
  !isset($_SESSION['user']) ||
  ( $_SESSION['user']['role'] ?? '' ) !== 'admin'
) {
  header('Location: ' . $base . '/login');
  exit;
}

$adminName = $_SESSION['user']['name'] ?? 'Admin';

$venues = [
  [
    'name'      => 'Zona Futsal',
    'district'  => 'Kaliwates',
    'sport'     => 'Futsal',
    'price'     => 30000,
    'status'    => 'Aktif',
  ],
  [
    'name'      => 'Lapangan 8',
    'district'  => 'Sumbersari',
    'sport'     => 'Badminton',
    'price'     => 35000,
    'status'    => 'Aktif',
  ],
  [
    'name'      => 'King Futsal',
    'district'  => 'Kaliwates',
    'sport'     => 'Futsal',
    'price'     => 30000,
    'status'    => 'Aktif',
  ],
  [
    'name'      => 'Rush Badminton',
    'district'  => 'Sumbersari',
    'sport'     => 'Badminton',
    'price'     => 35000,
    'status'    => 'Aktif',
  ],
];

ob_start();
?>

<section class="max-w-6xl mx-auto px-4 py-6">
  <div class="flex flex-col lg:flex-row gap-6">

    <!-- SIDEBAR: cuma Homepage + Logout -->
    <aside class="w-full lg:w-1/4">
      <div class="bg-[#244734] text-white rounded-[40px] p-6 flex flex-col items-center gap-6">

        <div class="w-28 h-28 rounded-full bg-gray-300"></div>

        <div class="text-center text-sm">
          <p class="text-xs opacity-80">Halo</p>
          <p class="text-base font-semibold">
            <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Admin') ?>
          </p>
        </div>

        <div class="w-full space-y-3 text-sm">

          <a href="<?= $base ?>/admin"
             class="w-full flex items-center gap-3 rounded-full px-5 py-3 bg-white text-[#244734] font-semibold">
            <i class="fa-solid fa-house"></i>
            <span>Homepage</span>
          </a>

          <button id="btnLogout"
                  class="w-full flex items-center gap-3 rounded-full px-5 py-3 bg-white text-[#244734] font-semibold">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </button>

        </div>
      </div>
    </aside>

    <!-- KONTEN EDIT VENUE -->
    <section class="flex-1">
      <div class="bg-[#244734] text-white rounded-[40px] p-6 md:p-8 space-y-6">

        <h1 class="text-xl font-semibold">Edit Venue</h1>

        <!-- Search sederhana -->
        <div class="bg-white/10 rounded-3xl p-4 flex flex-col md:flex-row gap-3 items-center">
          <input
            type="text"
            placeholder="Cari nama venue..."
            class="flex-1 rounded-full px-4 py-2 text-sm text-gray-900 bg-white outline-none"
          >
          <select class="rounded-full px-4 py-2 text-sm text-gray-900 bg-white outline-none">
            <option value="">Semua Kecamatan</option>
            <option value="Kaliwates">Kaliwates</option>
            <option value="Sumbersari">Sumbersari</option>
          </select>
          <select class="rounded-full px-4 py-2 text-sm text-gray-900 bg-white outline-none">
            <option value="">Semua Olahraga</option>
            <option value="Futsal">Futsal</option>
            <option value="Badminton">Badminton</option>
          </select>
        </div>

        <!-- LIST VENUE -->
        <div class="space-y-4">
          <?php foreach ($venues as $v): ?>
            <div class="bg-white rounded-3xl px-4 py-4 md:px-6 md:py-5 text-gray-800 flex flex-col md:flex-row md:items-center gap-4 md:gap-6">

              <div class="flex-1">
                <p class="text-sm text-gray-500">Nama Venue</p>
                <p class="text-base md:text-lg font-semibold">
                  <?= htmlspecialchars($v['name']) ?>
                </p>

                <div class="mt-2 flex flex-wrap items-center gap-3 text-xs md:text-sm text-gray-600">
                  <span class="inline-flex items-center gap-1">
                    <i class="fa-solid fa-location-dot text-[11px]"></i>
                    <?= htmlspecialchars($v['district']) ?>
                  </span>
                  <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                  <span><?= htmlspecialchars($v['sport']) ?></span>
                  <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                  <span>Mulai Rp<?= number_format($v['price'], 0, ',', '.') ?>/sesi</span>
                  <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                  <span class="px-2 py-0.5 rounded-full text-[11px] bg-emerald-100 text-emerald-700">
                    <?= htmlspecialchars($v['status']) ?>
                  </span>
                </div>
              </div>

              <div class="flex gap-2 md:flex-col md:items-end">
                <a href="#"
                   class="px-4 py-2 rounded-full text-xs md:text-sm bg-[#244734] text-white font-medium text-center">
                  Edit detail
                </a>
                <button type="button"
                        class="px-4 py-2 rounded-full text-xs md:text-sm border border-red-500 text-red-600 font-medium">
                  Nonaktifkan
                </button>
              </div>

            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

  </div>
</section>

<!-- POPUP LOGOUT -->
<div id="logoutModal"
     class="fixed inset-0 hidden flex items-center justify-center bg-black/40">
  <div class="bg-white rounded-2xl p-6 w-80 text-gray-800 text-center">
    <p class="font-semibold mb-4">Logout</p>
    <p class="text-sm mb-6">Yakin ingin keluar dari akun admin?</p>

    <div class="flex gap-3">
      <button id="cancelLogout"
              class="flex-1 py-2 rounded-full border font-semibold">
        Batal
      </button>

      <form action="<?= $base ?>/logout" method="post" class="flex-1">
        <button type="submit"
                class="w-full py-2 rounded-full bg-[#244734] text-white font-semibold">
          Logout
        </button>
      </form>
    </div>
  </div>
</div>

<script>
  const btnLogout = document.getElementById('btnLogout');
  const modal     = document.getElementById('logoutModal');
  const cancelBtn = document.getElementById('cancelLogout');

  if (btnLogout && modal && cancelBtn) {
    btnLogout.onclick  = () => modal.classList.remove('hidden');
    cancelBtn.onclick  = () => modal.classList.add('hidden');
  }
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/admin-base.php';
