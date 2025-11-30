<?php
$title = 'Partner With Us - Lapanganin';
ob_start();
?>

<section class="container mx-auto px-4 py-10 lg:py-16 space-y-16">

  <div>
    <div class="w-full overflow-hidden rounded-3xl">
      <img
        src="/assets/img/foto-atlit.jpg"
        alt="Tim olahraga yang bekerjasama dengan Lapanganin"
        class="w-full h-full object-cover"
      >
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)]">
      <div>
        <p class="text-xs lg:text-sm font-semibold tracking-wide text-emerald-800 mb-2">
          KERJASAMA DENGAN LAPANGANIN
        </p>
        <h1 class="text-2xl lg:text-3xl xl:text-4xl font-extrabold leading-snug">
          Sistem Booking Inovatif, Promosi Eksklusif. Perkuat Branding
          Lapangan Anda Bersama Lapanganin.
        </h1>
      </div>

      <div class="text-sm lg:text-base text-gray-600 leading-relaxed">
        <p class="mb-3">
          Lapanganin menawarkan sebuah platform yang menggabungkan Sistem Booking inovatif untuk
          pengelolaan jadwal yang efisien dan modern, serta layanan Promosi eksklusif yang menargetkan
          komunitas olahraga lokal di sekitar venue Anda.
        </p>
        <p>
          Dengan bergabung, pemilik venue dapat memperkuat branding Lapangan Anda untuk meningkatkan
          visibilitas, kepercayaan pelanggan, dan pada akhirnya mendorong tingkat okupansi dan pendapatan
          bisnis Anda.
        </p>
      </div>
    </div>
  </div>

  <div class="grid gap-10 lg:grid-cols-2 items-center">
    <div class="bg-white rounded-3xl shadow-sm p-4 lg:p-6">
      <div class="w-full rounded-2xl overflow-hidden">
        <img
          src="/assets/img/foto-data-pwu.jpg"
          alt="Dashboard performa booking dan laporan venue"
          class="w-full h-full object-cover"
        >
      </div>
    </div>

    <div class="space-y-4">
      <h2 class="text-2xl lg:text-3xl font-extrabold leading-snug">
        Optimalkan operasional venue olahraga dengan platform
        manajemen yang efisien dan canggih.
      </h2>
      <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
        Website yang dirancang khusus untuk meningkatkan efisiensi dan penyewaan venue olahraga Anda.
      </p>
      <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
        Telah menjadi pilihan utama lebih dari 300+ venue olahraga di wilayah Jember dan sekitarnya.
      </p>
    </div>
  </div>

  <div class="space-y-12">

    <div class="grid gap-10 lg:grid-cols-2 items-start">
      <div class="space-y-3">
        <p class="text-xs lg:text-sm font-semibold tracking-wide text-emerald-700">
          EVENT ACTIVATION
        </p>
        <h3 class="text-2xl lg:text-3xl font-extrabold leading-snug">
          Tingkatkan Brand Awareness Melalui Kolaborasi yang Menarik dan Interaktif.
        </h3>
        <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
          Tingkatkan brand awareness Anda melalui kolaborasi bersama Lapanganin. Kami membantu brand Anda
          terlibat langsung dengan audiens, memperluas jangkauan, dan menciptakan pengalaman yang berkesan.
        </p>
      </div>

      <div class="flex flex-col items-end space-y-3">
        <p class="text-xs lg:text-sm font-semibold tracking-wide text-emerald-700">
          TELAH DIPERCAYA OLEH
        </p>

        <img
          src="/assets/img/telah-dipercaya.png"
          alt="Logo partner"
          class="h-18 lg:h-20 object-contain"
        >
      </div>
    </div>

    <div class="flex justify-end w-full">
      <div class="rounded-3xl bg-emerald-900 text-white px-6 py-4 lg:px-10 lg:py-5 flex items-center gap-6 shadow-md">
        <p class="text-base lg:text-lg font-semibold whitespace-nowrap">
          Butuh Informasi Lebih Lanjut?
        </p>

        <a
          href="https://wa.me/6281249145365?text=Halo%20Lapanganin%2C%20saya%20tertarik%20untuk%20kerjasama%20venue."
          class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white text-emerald-900 text-xs lg:text-sm font-medium hover:bg-emerald-50 whitespace-nowrap"
        >
          Hubungi Kami Sekarang
        </a>
      </div>
    </div>

  </div>

</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
?>
