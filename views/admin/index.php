<?php
$title = 'Admin Dashboard - Lapanganin';

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

$adminName = $_SESSION['user']['name'] ?? 'Admin';

ob_start();
?>

<section class="max-w-6xl mx-auto px-4 lg:px-6 py-6">
  <div class="flex flex-col lg:flex-row gap-6">

    <!-- SIDEBAR -->
    <aside class="w-full lg:w-1/4">
      <div class="bg-[#244734] text-white rounded-[40px] p-6 flex flex-col items-center gap-6">

        <div class="w-28 h-28 rounded-full bg-gray-300"></div>

        <div class="text-center text-sm">
          <p class="text-xs opacity-80">Halo</p>
          <p class="text-base font-semibold">
            <?= htmlspecialchars($adminName) ?>
          </p>
        </div>

        <div class="w-full space-y-3 text-sm">

          <a href="<?= $base ?>/admin"
             class="w-full flex items-center gap-3 rounded-full px-5 py-3 font-semibold bg-white text-[#244734]">
            <i class="fa-solid fa-house"></i>
            <span>Homepage</span>
          </a>

          <button id="btnLogout"
                  class="w-full flex items-center gap-3 rounded-full px-5 py-3 font-semibold bg-white text-[#244734]">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </button>

        </div>
      </div>
    </aside>

    <!-- KONTEN -->
    <section class="flex-1">
      <div class="bg-[#244734] text-white rounded-[40px] p-6 md:p-8 space-y-8">

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

          <div class="bg-white rounded-3xl p-4 text-center text-gray-800">
            <p class="text-sm text-gray-500">Total Customer</p>
            <p class="text-2xl font-semibold mt-2">1000</p>
          </div>

          <div class="bg-white rounded-3xl p-4 text-center text-gray-800">
            <p class="text-sm text-gray-500">Total Revenue</p>
            <p class="text-xl font-semibold mt-2">Rp100.000.000</p>
          </div>

          <div class="bg-white rounded-3xl p-4 text-center text-gray-800">
            <p class="text-sm text-gray-500">Total Orders</p>
            <p class="text-2xl font-semibold mt-2">200</p>
          </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

          <a href="<?= $base ?>/admin/venue/add"
             class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center gap-3 text-gray-800">
            <p class="font-semibold">Add Venue</p>
            <i class="fa-solid fa-plus text-2xl"></i>
          </a>

          <a href="<?= $base ?>/admin/venue/edit"
             class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center gap-3 text-gray-800">
            <p class="font-semibold">Edit Venue</p>
            <i class="fa-solid fa-pen text-2xl"></i>
          </a>

          <div class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center gap-3 text-gray-800">
            <p class="font-semibold">Delete Venue</p>
            <i class="fa-solid fa-trash-can text-2xl"></i>
          </div>

        </div>

        <!-- GRAFIK DARI ASSET -->
        <div class="bg-white rounded-3xl p-4 text-gray-700">
          <p class="text-sm font-semibold mb-3">Product sales</p>
          <div class="h-40 rounded-xl overflow-hidden">
            <img
              src="<?= $base ?>/assets/img/graphic.png"
              alt="Product sales chart"
              class="w-full h-full object-cover"
            >
          </div>
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
  const btnLogout    = document.getElementById('btnLogout');
  const logoutModal  = document.getElementById('logoutModal');
  const cancelLogout = document.getElementById('cancelLogout');

  if (btnLogout && logoutModal && cancelLogout) {
    btnLogout.onclick    = () => logoutModal.classList.remove('hidden');
    cancelLogout.onclick = () => logoutModal.classList.add('hidden');
  }
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/admin-base.php';
