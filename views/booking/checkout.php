<?php
// judul halaman
$title = $title ?? 'Pilih Metode Pembayaran - Lapanganin';

// mulai buffer konten
ob_start();
?>

<section class="max-w-6xl mx-auto px-4 py-10">
  <!-- breadcrumb sederhana -->
  <button onclick="history.back()" class="text-sm text-gray-500 mb-4 hover:underline">
    &larr; Kembali ke Pemesanan
  </button>

  <!-- judul halaman -->
  <div class="mb-8">
    <h1 class="text-2xl font-bold">Pilih Metode Pembayaran</h1>
    <p class="text-sm text-gray-500 mt-1">Aman dan terpercaya</p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-8">
    <!-- KIRI: QR + cara pembayaran -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
      <h2 class="text-sm font-semibold mb-4">Scan QRIS untuk Bayar</h2>

      <div class="flex flex-col items-center gap-4">
        <div class="w-52 h-52 rounded-2xl border border-gray-200 flex items-center justify-center overflow-hidden">
          <!-- ganti dengan gambar QR beneran -->
          <img src="/assets/img/qris.jpg" alt="QRIS Lapanganin" class="w-full h-full object-contain">
        </div>

        <p class="text-xs text-gray-500 text-center max-w-xs">
          Buka aplikasi mobile banking atau e-wallet. Pilih menu Scan QR atau QRIS lalu arahkan kamera ke kode di atas.
        </p>

        <div class="w-full border-t border-gray-200 pt-4 mt-2 text-xs text-gray-500 space-y-1">
          <p class="font-semibold text-gray-700">Cara Pembayaran:</p>
          <p>1. Scan QR menggunakan aplikasi keuangan kamu.</p>
          <p>2. Pastikan nominal sudah Rp 53.000.</p>
          <p>3. Konfirmasi pembayaran di aplikasi.</p>
        </div>
      </div>
    </div>

    <!-- KANAN: ringkasan pesanan -->
    <div class="space-y-4">
      <div class="bg-white rounded-3xl shadow-sm p-6 space-y-3">
        <h2 class="text-sm font-semibold mb-2">Ringkasan Pesanan</h2>

        <div class="flex gap-3 items-center">
          <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-200 flex items-center justify-center">
            <img src="/assets/img/badminton.jpg" alt="Rush Badminton" class="w-full h-full object-cover">
          </div>
          <div class="text-sm">
            <p class="font-semibold">Lapangan 8</p>
            <p class="text-xs text-gray-500">1 Lapangan</p>
          </div>
        </div>

        <div class="text-sm text-gray-600 space-y-1 pt-2">
          <p>Jadwal:</p>
          <ul class="list-disc list-inside text-xs">
            <li>11.00 - 12.00</li>
            <li>12.00 - 13.00</li>
          </ul>
        </div>

        <div class="border-t border-gray-200 pt-3 mt-2 text-sm space-y-1">
          <div class="flex justify-between">
            <span>Harga Lapangan</span>
            <span>Rp 70.000</span>
          </div>
          <div class="flex justify-between">
            <span>Biaya Layanan</span>
            <span>Rp 3.000</span>
          </div>
          <div class="flex justify-between font-semibold pt-1">
            <span>Total Pembayaran</span>
            <span>Rp 73.000</span>
          </div>
        </div>
      </div>

      <!-- tombol bawah -->
        <a href="<?= $base ?>/booking/pilih-metode"
          class="px-6 py-3 rounded-full border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
          Ganti Metode
        </a>

        <button
          type="button"
          id="btnPaid"
          class="w-full sm:w-auto px-5 py-2.5 rounded-full bg-gradient-to-r from-indigo-500 to-fuchsia-500 text-sm font-medium text-white hover:opacity-90"
        >
          Saya Sudah Bayar
        </button>
      </div>
    </div>
  </div>
</section>

<!-- MODAL PEMBAYARAN BERHASIL -->
<div
  id="successModal"
  class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 hidden"
>
  <div class="bg-white rounded-3xl shadow-xl w-full max-w-md mx-4 p-6 relative">
    <button
      type="button"
      id="btnCloseModal"
      class="absolute top-3 right-4 text-gray-400 hover:text-gray-600"
    >
      ✕
    </button>

    <div class="flex flex-col items-center gap-4">
      <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
        <span class="text-emerald-600 text-2xl">✔</span>
      </div>

      <div class="text-center space-y-2">
        <h2 class="text-lg font-semibold">Pembayaran Berhasil!!</h2>
        <p class="text-xs text-gray-500">
          Selamat. Kamu telah berhasil memesan venue.
        </p>
      </div>

      <div class="w-full text-xs bg-gray-50 rounded-2xl p-4 space-y-2">
        <div class="flex justify-between">
          <span class="text-gray-500">Venue</span>
          <span class="font-semibold">Lapangan 8</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-500">Jumlah</span>
          <span class="font-semibold">1 Lapangan</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-500">Total Pembayaran</span>
          <span class="font-semibold">Rp 73.000</span>
        </div>

        <div class="pt-2">
          <p class="text-gray-500 mb-1">Jadwal</p>
          <ul class="list-disc list-inside text-gray-700">
            <li>11.00 - 11.00</li>
            <li>12.00 - 13.00</li>
          </ul>
        </div>
      </div>

      <button
        type="button"
        id="btnGoHome"
        class="w-full py-2.5 rounded-full bg-gradient-to-r from-indigo-500 to-fuchsia-500 text-sm font-medium text-white hover:opacity-90"
      >
        Kembali ke Homepage
      </button>

      <p class="text-[10px] text-gray-400">
        Invoice telah dikirim ke email kamu.
      </p>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const btnPaid      = document.getElementById('btnPaid');
  const modal        = document.getElementById('successModal');
  const btnClose     = document.getElementById('btnCloseModal');
  const btnGoHome    = document.getElementById('btnGoHome');

  function showModal() {
    modal.classList.remove('hidden');
  }

  function hideModal() {
    modal.classList.add('hidden');
  }

    btnPaid.addEventListener('click', () => {
        showModal();

        setTimeout(() => {
            window.location.href = '/';
        }, 1500);
    });

    btnClose?.addEventListener('click', hideModal);
    modal?.addEventListener('click', (e) => {
        if (e.target === modal) hideModal();
    });
});
</script>

<?php
// kirim ke base layout
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
