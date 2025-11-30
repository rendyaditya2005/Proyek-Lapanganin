<?php
$title = 'Pilih Metode Pembayaran - Lapanganin';
ob_start();
?>

<section class="space-y-6">
  <a href="<?= $base ?>/booking/checkout" class="inline-flex items-center gap-2 text-sm text-gray-500 mb-4">
    <i class="fa-solid fa-chevron-left text-xs"></i>
    <span>Kembali ke Pemesanan</span>
  </a>

  <div class="space-y-1">
    <h1 class="text-2xl font-semibold">Pilih Metode Pembayaran</h1>
    <p class="text-sm text-gray-500">Aman dan terpercaya</p>
  </div>

  <div class="grid grid-cols-1 gap-6 md:grid-cols-[minmax(0,2fr),minmax(0,1.2fr)]">
    <!-- Kiri: pilihan metode -->
    <div class="space-y-5">

      <!-- Pembayaran Instan -->
      <div class="bg-white rounded-2xl shadow-sm border p-5 space-y-3">
        <div class="flex items-center gap-2">
          <span class="w-7 h-7 flex items-center justify-center rounded-full bg-emerald-100 text-emerald-600 text-sm">
            <i class="fa-solid fa-bolt"></i>
          </span>
          <div>
            <p class="font-medium text-sm">Pembayaran Instan</p>
            <p class="text-xs text-gray-500">QRIS</p>
          </div>
        </div>

        <button
          type="button"
          data-method="qris"
          class="pay-card w-full mt-3 border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
              <i class="fa-solid fa-qrcode text-sm"></i>
            </span>
            <div>
              <p class="text-sm font-medium">QRIS</p>
              <p class="text-xs text-gray-500">Scan QR untuk bayar</p>
            </div>
          </div>
          <span class="text-xs text-gray-400">Instan</span>
        </button>
      </div>

      <!-- E Wallet -->
      <div class="bg-white rounded-2xl shadow-sm border p-5 space-y-3">
        <div class="flex items-center gap-2">
          <span class="w-7 h-7 flex items-center justify-center rounded-full bg-purple-100 text-purple-600 text-sm">
            <i class="fa-solid fa-wallet"></i>
          </span>
          <div>
            <p class="font-medium text-sm">E Wallet</p>
            <p class="text-xs text-gray-500">Pilih dompet digital</p>
          </div>
        </div>

        <div class="space-y-2 mt-2">
          <button type="button" data-method="gopay" class="pay-card w-full border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-circle text-xs"></i>
              </span>
              <div>
                <p class="text-sm font-medium">GoPay</p>
                <p class="text-xs text-gray-500">Bayar dengan GoPay</p>
              </div>
            </div>
          </button>

          <button type="button" data-method="ovo" class="pay-card w-full border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-circle text-xs"></i>
              </span>
              <div>
                <p class="text-sm font-medium">OVO</p>
                <p class="text-xs text-gray-500">Bayar dengan OVO</p>
              </div>
            </div>
          </button>

          <button type="button" data-method="dana" class="pay-card w-full border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-circle text-xs"></i>
              </span>
              <div>
                <p class="text-sm font-medium">DANA</p>
                <p class="text-xs text-gray-500">Bayar dengan DANA</p>
              </div>
            </div>
          </button>
        </div>
      </div>

      <!-- Transfer Bank -->
      <div class="bg-white rounded-2xl shadow-sm border p-5 space-y-3">
        <div class="flex items-center gap-2">
          <span class="w-7 h-7 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-sm">
            <i class="fa-solid fa-building-columns"></i>
          </span>
          <div>
            <p class="font-medium text-sm">Transfer Bank</p>
            <p class="text-xs text-gray-500">Virtual Account</p>
          </div>
        </div>

        <div class="space-y-2 mt-2">
          <button type="button" data-method="va_bca" class="pay-card w-full border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-building-columns text-xs"></i>
              </span>
              <div>
                <p class="text-sm font-medium">BCA Virtual Account</p>
                <p class="text-xs text-gray-500">Transfer via ATM atau m Banking BCA</p>
              </div>
            </div>
          </button>

          <button type="button" data-method="va_mandiri" class="pay-card w-full border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-building-columns text-xs"></i>
              </span>
              <div>
                <p class="text-sm font-medium">Mandiri Virtual Account</p>
                <p class="text-xs text-gray-500">Transfer via ATM atau m Banking Mandiri</p>
              </div>
            </div>
          </button>

          <button type="button" data-method="va_bni" class="pay-card w-full border border-gray-300 rounded-xl px-4 py-3 flex items-center justify-between text-left hover:border-gray-900 transition">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-building-columns text-xs"></i>
              </span>
              <div>
                <p class="text-sm font-medium">BNI Virtual Account</p>
                <p class="text-xs text-gray-500">Transfer via ATM atau m Banking BNI</p>
              </div>
            </div>
          </button>
        </div>
      </div>
    </div>

</section>

<script>
  const cards = document.querySelectorAll('.pay-card');

  cards.forEach(card => {
    card.addEventListener('click', () => {
      const method = card.dataset.method;
      window.location.href = '<?= $base ?>/booking/checkout?method=' + encodeURIComponent(method);
    });
  });
</script>

<?php
$content = ob_get_clean();
include __DIR__.'/../layouts/base.php';
