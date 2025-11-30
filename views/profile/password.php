<?php
$title = 'Ubah Password - Lapanganin';
ob_start();

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<style>
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

<section class="max-w-6xl mx-auto px-4 lg:px-6 py-10">
  <div class="flex flex-col lg:flex-row gap-8">

    <!-- SIDEBAR -->
    <aside class="w-full lg:w-1/3">
      <div class="bg-[#244734] text-white rounded-[40px] p-8 flex flex-col items-center">
        <div class="w-40 h-40 rounded-full checkerboard mb-8 overflow-hidden"></div>

        <div class="w-full space-y-4 text-sm">

            <a href="<?= $base ?>/profile"
            class="w-full flex items-center gap-3 rounded-full px-5 py-3 font-semibold transition
            <?= $currentPath === '/profile'
                ? 'bg-[#244734] text-white'
                : 'bg-white text-[#244734] hover:bg-white/90' ?>">
            <i class="fa-regular fa-user"></i>
            <span>Informasi Pengguna</span>
            </a>

            <a href="<?= $base ?>/profile/password"
            class="w-full flex items-center gap-3 rounded-full px-5 py-3 font-semibold transition
            <?= $currentPath === '/profile/password'
                ? 'bg-[#244734] text-white'
                : 'bg-white text-[#244734] hover:bg-white/90' ?>">
            <i class="fa-solid fa-lock"></i>
            <span>Password</span>
            </a>

            <button type="button"
                    onclick="openLogoutModal()"
                    class="w-full flex items-center gap-3 bg-white text-[#244734] rounded-full px-5 py-3 font-semibold">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
            </button>

        </div>
      </div>
    </aside>

    <!-- KONTEN UBAH PASSWORD -->
    <section class="flex-1">
      <div class="bg-[#244734] text-white rounded-[40px] p-8 md:p-10">
        <h1 class="text-2xl md:text-3xl font-semibold mb-8">Ubah Password</h1>

        <form action="<?= $base ?>/profile/password-update.php" method="post" class="space-y-6">

          <div>
            <label class="block text-sm mb-2">Password Saat Ini</label>
            <input type="password" name="current_password" required
                   class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
          </div>

          <div>
            <label class="block text-sm mb-2">Password Baru</label>
            <input type="password" name="new_password" required minlength="8"
                   class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
            <p class="text-xs text-gray-200/80 mt-1">
              Minimal 8 karakter, disarankan kombinasi huruf dan angka.
            </p>
          </div>

          <div>
            <label class="block text-sm mb-2">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" required
                   class="w-full rounded-full px-5 py-3 text-sm text-gray-900 bg-white outline-none">
          </div>

          <div class="flex justify-end gap-4 pt-6">
            <a href="<?= $base ?>/profile"
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

<!-- LOGOUT MODAL -->
<div id="logoutModal"
     class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/40">

  <div class="bg-white rounded-2xl p-6 w-full max-w-sm text-center">
    <h2 class="text-lg font-semibold text-gray-900 mb-2">
      Konfirmasi Logout
    </h2>
    <p class="text-sm text-gray-600 mb-6">
      Kamu yakin ingin keluar dari akun?
    </p>

    <div class="flex gap-3 justify-center">
      <button onclick="closeLogoutModal()"
              class="px-5 py-2 rounded-full bg-gray-200 text-gray-800 text-sm font-medium">
        Batal
      </button>

      <form action="<?= $base ?>/logout" method="post">
        <button type="submit"
                class="px-5 py-2 rounded-full bg-red-600 text-white text-sm font-medium">
          Logout
        </button>
      </form>
    </div>
  </div>
</div>

<script>
function openLogoutModal() {
  document.getElementById('logoutModal').classList.remove('hidden');
  document.getElementById('logoutModal').classList.add('flex');
}

function closeLogoutModal() {
  document.getElementById('logoutModal').classList.add('hidden');
  document.getElementById('logoutModal').classList.remove('flex');
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
