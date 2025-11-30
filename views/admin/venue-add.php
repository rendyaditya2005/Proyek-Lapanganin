<?php
$title          = 'Add Venue - Admin';

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

ob_start();
?>

<section class="max-w-6xl mx-auto px-4 py-6">
  <div class="flex flex-col lg:flex-row gap-6">

    <!-- SIDEBAR -->
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

    <!-- KONTEN -->
    <section class="flex-1">
      <div class="bg-[#244734] text-white rounded-[40px] p-6 md:p-8">

        <h1 class="text-xl font-semibold mb-8">Tambah Venue</h1>

        <form action="#" method="post" class="space-y-6">

          <div>
            <label class="block text-sm mb-2">Nama Venue</label>
            <input type="text"
                   class="w-full rounded-full px-5 py-3 text-gray-900 text-sm bg-white outline-none"
                   placeholder="Contoh: King Futsal">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm mb-2">Kecamatan</label>
              <select class="w-full rounded-full px-5 py-3 text-gray-900 text-sm bg-white outline-none">
                <option>Kaliwates</option>
                <option>Sumbersari</option>
                <option>Patrang</option>
              </select>
            </div>

            <div>
              <label class="block text-sm mb-2">Kategori Olahraga</label>
              <select class="w-full rounded-full px-5 py-3 text-gray-900 text-sm bg-white outline-none">
                <option>Futsal</option>
                <option>Badminton</option>
                <option>Basket</option>
              </select>
            </div>
          </div>

          <div>
            <label class="block text-sm mb-2">Harga per Sesi</label>
            <input type="number"
                   class="w-full rounded-full px-5 py-3 text-gray-900 text-sm bg-white outline-none"
                   placeholder="30000">
          </div>

          <div>
            <label class="block text-sm mb-2">Deskripsi Venue</label>
            <textarea rows="4"
                      class="w-full rounded-3xl px-5 py-3 text-gray-900 text-sm bg-white outline-none"
                      placeholder="Deskripsi singkat venue"></textarea>
          </div>

          <div>
            <label class="block text-sm mb-2">Foto Venue</label>
            <input type="file"
                   class="w-full bg-white rounded-full px-5 py-2 text-sm text-gray-900">
          </div>

          <div class="flex justify-end gap-4 pt-6">
            <a href="<?= $base ?>/admin"
               class="rounded-full px-8 py-3 bg-white text-[#244734] font-semibold">
              Batal
            </a>

            <button type="submit"
                    class="rounded-full px-8 py-3 bg-white text-[#244734] font-semibold">
              Simpan
            </button>
          </div>

        </form>

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

  btnLogout.onclick  = () => modal.classList.remove('hidden');
  cancelBtn.onclick  = () => modal.classList.add('hidden');
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/admin-base.php';
