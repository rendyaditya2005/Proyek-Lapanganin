<?php
$title = 'Login - Lapanganin';
ob_start();
?>

<!-- Hilangkan padding/margin bawaan base.php di halaman ini -->
<style>
  main { max-width:none !important; margin:0 !important; padding:0 !important; }
  body { margin:0 !important; }
</style>

<!-- Grid 2 kolom: kiri 50%, kanan 50% -->
<div class="min-h-screen grid md:grid-cols-2">

  <!-- Kiri: background full, fokus kiri, tanpa celah -->
  <section class="relative hidden md:block">
    <div class="absolute inset-0 bg-no-repeat bg-cover bg-left"
         style="background-image:url('/assets/img/login-regist.png?v=2')"></div>
    <div class="absolute inset-0 bg-black/35"></div>

    <div class="absolute top-6 left-6 flex items-center gap-3">
      <img src="/assets/img/logo-lapanganin.png" alt="Lapanganin" class="w-[60px] h-[60px] object-contain drop-shadow">
      <span class="text-white/90 font-semibold text-lg">LAPANGANIN</span>
    </div>

    <div class="absolute bottom-10 left-10 text-white max-w-md">
      <h1 class="text-4xl font-extrabold leading-tight">Temukan Lapangan<br>Keinginan Anda</h1>
      <p class="mt-3 text-white/90">Jadwalkan dengan mudah kapanpun di manapun!</p>
      <a href="<?= $base ?>/register"
         class="mt-6 inline-block bg-white text-[#2f5d4d] px-6 py-2 rounded-full font-medium">Daftar</a>
    </div>
  </section>

  <!-- Kanan: tetap -->
  <div class="w-full flex items-center justify-center px-6 py-10">
    <div class="w-full max-w-md">
      <h2 class="text-4xl font-extrabold text-[#2f5d4d]">Selamat Datang<br>kembali!</h2>
      <p class="mt-3 text-gray-500">Masukkan akun anda!</p>

      <form action="<?= $base ?>/auth/do-login" method="POST" class="mt-6 space-y-4">
        <div>
          <label class="block text-gray-700 mb-2">Email</label>
          <input type="email" name="email" placeholder="Email"
                 class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#2f5d4d]">
        </div>
        <div>
          <label class="block text-gray-700 mb-2">Kata Sandi</label>
          <input type="password" name="password" placeholder="Kata Sandi"
                 class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#2f5d4d]">
        </div>
        <div class="text-right text-sm">
          <a href="#" class="text-[#2f5d4d] hover:underline">Lupa Kata Sandi?</a>
        </div>
        <button type="submit"
                class="w-full bg-[#2f5d4d] text-white py-3 rounded-lg font-semibold hover:bg-[#3b6b5a]">
          Masuk
        </button>
      </form>

      <p class="text-center text-sm text-gray-600 mt-6">
        Belum punya akun?
        <a href="<?= $base ?>/register" class="text-[#2f5d4d] font-medium">Daftar</a>
      </p>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>
