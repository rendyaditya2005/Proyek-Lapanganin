<?php
// judul halaman
$title = 'Zona Futsal - Lapanganin';

// mulai buffer konten
ob_start();
?>

<section class="max-w-6xl mx-auto px-4 py-10">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

    <!-- KIRI: FOTO + INFO -->
    <div>
      <img src="/assets/img/badminton.jpg" class="w-full rounded-2xl mb-6" alt="">
      
      <h1 class="text-2xl font-bold">Lapangan 8</h1>
      <p class="mt-1 text-gray-600">⭐ 4.5 • Jember</p>

      <h2 class="font-semibold text-lg mt-6">Deskripsi</h2>
      <p class="mt-2 text-gray-700">
        Lapangan 8 memiliki ruang yang rapi dengan kualitas lantai yang halus dan tidak licin. Ventilasi di dalam
        gedung cukup baik sehingga tetap nyaman saat digunakan dalam sesi panjang. Venue ini sering dipakai
        untuk latihan indoor karena suasananya tenang dan jarang terlalu ramai.
      </p>

      <h2 class="font-semibold text-lg mt-6">Aturan Venue</h2>
      <p class="mt-2 text-gray-700">
        Pembayaran tidak dapat direfund. Pastikan jadwal sudah benar sebelum memesan.
      </p>

      <h2 class="font-semibold text-lg mt-6">Lokasi</h2>
      <p class="mt-2 text-gray-700">
        Jl. Teuku Umar Gg. 8 Tegal Besar Kulon, Tegal Besar, Jember, Jawa Timur.
      </p>
    </div>

    <!-- KANAN: JADWAL -->
    <div>
      <h2 class="text-xl font-bold mb-4">Pilih Jadwal</h2>

      <!-- FORM BOOKING -->
      <form action="<?= $base ?>/booking/checkout" method="POST" id="bookingForm" class="space-y-4">

        <!-- hidden untuk dikirim ke backend -->
        <input type="hidden" name="venue_slug" value="zona-futsal">
        <input type="hidden" name="selected_date" id="selected_date">
        <input type="hidden" name="selected_slots" id="selected_slots">

        <!-- TANGGAL OTOMATIS -->
        <div>
          <p class="text-sm text-gray-600 mb-2">Pilih tanggal</p>
          <div class="flex gap-2 overflow-x-auto pb-3">

            <?php
              date_default_timezone_set('Asia/Jakarta');
              $start = new DateTime("2025-11-16");
              $end   = new DateTime("2025-11-30");
              while ($start <= $end):
                $dateValue = $start->format("Y-m-d");
                $label     = $start->format("D d M");
            ?>
              <button
                type="button"
                class="date-btn px-4 py-2 rounded-xl bg-gray-100 whitespace-nowrap border text-sm hover:bg-emerald-50 hover:border-emerald-500"
                data-date="<?= $dateValue ?>">
                <?= $label ?>
              </button>
            <?php 
              $start->modify("+1 day");
              endwhile; 
            ?>

          </div>
        </div>

        <!-- WRAPPER HIJAU JAM -->
        <div>
          <p class="text-sm text-gray-600 mb-2">Pilih jam</p>

          <div class="p-4 bg-[#224f3c] rounded-2xl">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">

              <?php
              // contoh slot yang sudah dibooking
              $bookedSlots = [];

              for ($i = 9; $i <= 22; $i++):
                  $s = sprintf("%02d:00", $i);
                  $e = sprintf("%02d:00", $i+1);

                  $isBooked = in_array($s, $bookedSlots);

                  $classes = 'time-btn text-sm rounded-xl p-3 border transition text-left';

                  if ($isBooked) {
                    $classes .= ' bg-gray-200 text-gray-500 border-gray-300 cursor-not-allowed opacity-70';
                  } else {
                    $classes .= ' bg-white text-gray-900 border-[#205c3b] hover:bg-[#205c3b] hover:text-white cursor-pointer';
                  }
              ?>

              <button
                type="button"
                class="<?= $classes ?>"
                data-time="<?= $s ?>"
                data-booked="<?= $isBooked ? '1' : '0' ?>">
                <p class="font-semibold"><?= $s ?> - <?= $e ?></p>
                <p>Rp35.000</p>
                <p><?= $isBooked ? 'Booked' : 'Available' ?></p>
              </button>

              <?php endfor; ?>

            </div>
          </div>
        </div>

        <!-- RINGKASAN PILIHAN -->
        <p class="text-sm text-gray-700" id="summaryText">
          Tanggal dan jam belum dipilih.
        </p>

        <!-- TOMBOL SUBMIT -->
        <button
          type="submit"
          class="mt-2 px-6 py-3 bg-green-800 text-white rounded-xl text-sm font-medium disabled:opacity-60 disabled:cursor-not-allowed"
          id="submitBtn"
          disabled>
          Pilih Jadwal
        </button>

      </form>
    </div>

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const dateButtons = document.querySelectorAll('.date-btn');
  const timeButtons = document.querySelectorAll('.time-btn');

  const inputDate   = document.getElementById('selected_date');
  const inputSlots  = document.getElementById('selected_slots');

  const summaryText = document.getElementById('summaryText');
  const submitBtn   = document.getElementById('submitBtn');

  let selectedTimes = [];

  function updateHiddenSlots() {
    if (!inputDate.value || selectedTimes.length === 0) {
      inputSlots.value = '';
      return;
    }

    const slots = selectedTimes.map(t => inputDate.value + ' ' + t);
    inputSlots.value = slots.join(',');
  }

  function updateSummary() {
    if (inputDate.value && selectedTimes.length > 0) {
      summaryText.textContent =
        'Kamu memilih tanggal ' + inputDate.value +
        ' jam ' + selectedTimes.join(', ');
      submitBtn.disabled = false;
    } else if (inputDate.value) {
      summaryText.textContent =
        'Kamu memilih tanggal ' + inputDate.value + '. Silakan pilih jam.';
      submitBtn.disabled = true;
    } else if (selectedTimes.length > 0) {
      summaryText.textContent =
        'Kamu memilih ' + selectedTimes.length + ' jam. Silakan pilih tanggal.';
      submitBtn.disabled = true;
    } else {
      summaryText.textContent = 'Tanggal dan jam belum dipilih.';
      submitBtn.disabled = true;
    }
  }

  // klik tanggal
  dateButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      dateButtons.forEach(b => {
        b.classList.remove('bg-emerald-600', 'text-white', 'border-emerald-600');
        b.classList.add('bg-gray-100', 'border-gray-200');
      });

      btn.classList.remove('bg-gray-100', 'border-gray-200');
      btn.classList.add('bg-emerald-600', 'text-white', 'border-emerald-600');

      inputDate.value = btn.dataset.date;

      selectedTimes = [];
      timeButtons.forEach(b => {
        if (b.dataset.booked === '0') {
          b.classList.remove('ring-2', 'ring-yellow-400', 'bg-[#205c3b]', 'text-white');
          b.classList.add('bg-white', 'text-gray-900');
        }
      });

      updateHiddenSlots();
      updateSummary();
    });
  });

  // klik jam multi select
  timeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (btn.dataset.booked === '1') return;

      const time  = btn.dataset.time;
      const index = selectedTimes.indexOf(time);

      if (index === -1) {
        selectedTimes.push(time);
        btn.classList.add('ring-2', 'ring-yellow-400');
        btn.classList.remove('bg-white', 'text-gray-900');
        btn.classList.add('bg-[#205c3b]', 'text-white');
      } else {
        selectedTimes.splice(index, 1);
        btn.classList.remove('ring-2', 'ring-yellow-400', 'bg-[#205c3b]', 'text-white');
        btn.classList.add('bg-white', 'text-gray-900');
      }

      updateHiddenSlots();
      updateSummary();
    });
  });

});
</script>

<?php
// ambil isi buffer dan kirim ke base.php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
