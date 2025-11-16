<?php include __DIR__ . '/../layouts/base.php'; ?>

<section class="max-w-6xl mx-auto px-4 py-10">

  <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

    <!-- KIRI: FOTO + INFO -->
    <div>
      <img src="/assets/img/futsal.jpg" class="w-full rounded-2xl mb-6" alt="">
      
      <h1 class="text-2xl font-bold">King Futsal</h1>
      <p class="mt-1 text-gray-600">⭐ 5.0 • Jember</p>

      <h2 class="font-semibold text-lg mt-6">Deskripsi</h2>
      <p class="mt-2 text-gray-700">
        King Futsal menawarkan lapangan yang luas dengan lantai yang nyaman untuk permainan cepat.
        Pencahayaan terang membuat permainan tetap jelas dan stabil. Venue ini cocok untuk latihan rutin maupun
        sparring antar komunitas.
      </p>

      <h2 class="font-semibold text-lg mt-6">Aturan Venue</h2>
      <p class="mt-2 text-gray-700">
        Pembayaran tidak dapat direfund. Pastikan jadwal sudah benar sebelum memesan.
      </p>

      <h2 class="font-semibold text-lg mt-6">Lokasi</h2>
      <p class="mt-2 text-gray-700">
        Jl. KH Shiddiq, Jember, Jawa Timur.
      </p>
    </div>

    <!-- KANAN: JADWAL -->
    <div>
      <h2 class="text-xl font-bold mb-4">Pilih Jadwal</h2>

      <!-- TANGGAL OTOMATIS -->
      <div class="flex gap-2 overflow-x-auto pb-3">

        <?php
          $start = new DateTime("2025-11-16");
          $end   = new DateTime("2025-11-30");
          while ($start <= $end):
        ?>
          <button class="px-4 py-2 rounded-xl bg-gray-100 whitespace-nowrap">
            <?= $start->format("D d M"); ?>
          </button>
        <?php 
          $start->modify("+1 day");
          endwhile; 
        ?>

      </div>

      <!-- JAM -->
<!-- WRAPPER HIJAU -->
        <div class="p-4 bg-[#224f3c] rounded-2xl mt-5">

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">

            <?php
            $bookedSlots = ['10:00', '15:00'];

            for ($i = 9; $i <= 22; $i++):
                $s = sprintf("%02d:00", $i);
                $e = sprintf("%02d:00", $i+1);

                $isBooked = in_array($s, $bookedSlots);

                $classes = 'text-sm rounded-xl p-3 border transition text-left';

                if ($isBooked) {
                $classes .= ' bg-gray-200 text-gray-500 border-gray-300 cursor-not-allowed';
                } else {
                $classes .= ' bg-white text-gray-900 border-[#205c3b] hover:bg-[#205c3b] hover:text-white cursor-pointer';
                }
            ?>

            <button class="<?= $classes ?>">
                <p class="font-semibold"><?= $s ?> - <?= $e ?></p>
                <p>Rp35.000</p>
                <p><?= $isBooked ? 'Booked' : 'Available' ?></p>
            </button>

            <?php endfor; ?>

        </div>

        </div>

      <button class="mt-6 px-6 py-3 bg-green-800 text-white rounded-xl">
        Pilih Jadwal
      </button>
    </div>

  </div>
  
</section>
