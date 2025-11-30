document.addEventListener('DOMContentLoaded', function () {
  try {
    console.log('home.js OK');

    // 1. DATA VENUE KAMU
    const venues = [
      {
        id: 1,
        name: 'Zona Futsal',
        location: 'Kaliwates, Jember',
        district: 'Kaliwates',
        sports: ['Futsal'],
        price: 30000,
        rating: 4.0,
        imageUrl: '/assets/img/futsal2.jpg',
        url: BASE_PATH + '/venue/zona-futsal'
      },
      {
        id: 2,
        name: 'Lapangan 8',
        location: 'Sumbersari, Jember',
        district: 'Sumbersari',
        sports: ['Badminton'],
        price: 35000,
        rating: 4.5,
        imageUrl: '/assets/img/badminton.jpg',
        url: BASE_PATH + '/venue/lapangan8'
      },
      {
        id: 3,
        name: 'King Futsal',
        location: 'Kaliwates, Jember',
        district: 'Kaliwates',
        sports: ['Futsal'],
        price: 30000,
        rating: 5.0,
        imageUrl: '/assets/img/futsal.jpg',
        url: BASE_PATH + '/venue/king-futsal'
      },
      {
        id: 4,
        name: 'Rush Badminton',
        location: 'Sumbersari, Jember',
        district: 'Sumbersari',
        sports: ['Badminton'],
        price: 35000,
        rating: 5.0,
        imageUrl: '/assets/img/rush.jpg',
        url: BASE_PATH + '/venue/rush-badminton'
      }
    ];

    // 2. AMBIL ELEMEN FILTER
    const sortSelect     = document.getElementById('sort-by');          // Urutkan Berdasarkan
    const districtSelect = document.getElementById('district-select');  // Pilih Kecamatan
    const sportSelect    = document.getElementById('sport-select');     // Pilih Kategori Olahraga
    const searchBtn      = document.getElementById('search-btn');       // Tombol Cari Venue
    const venueList      = document.getElementById('venue-list');
    const noResults      = document.getElementById('no-results');

    if (!venueList) {
      console.error('#venue-list tidak ditemukan');
      return;
    }

    // 3. RENDER KARTU VENUE
    function renderVenues(list) {
      venueList.innerHTML = '';

      if (!list.length) {
        if (noResults) noResults.classList.remove('hidden');
        return;
      }
      if (noResults) noResults.classList.add('hidden');

      list.forEach(v => {
        const firstSport = v.sports[0] || '';
        const wrapper = document.createElement('div');
        wrapper.className = 'venue-card bg-white rounded-2xl border shadow-sm overflow-hidden';

        wrapper.innerHTML = `
          <a href="${v.url}" class="block">
            <img class="w-full h-44 object-cover" src="${v.imageUrl}" alt="${v.name}" loading="lazy">
            <div class="p-4 text-sm">
              <p class="text-gray-500">Venue</p>
              <h3 class="font-semibold text-lg text-gray-900">${v.name}</h3>
              <p class="text-gray-500 mt-1">
                ⭐ ${v.rating.toFixed(2)} • ${v.location}
              </p>
              <p class="mt-1 text-gray-600">${firstSport}</p>
              <p class="font-semibold mt-2">
                Mulai Rp${v.price.toLocaleString('id-ID')}
                <span class="text-gray-700 text-xs">/sesi</span>
              </p>
            </div>
          </a>
        `;

        venueList.appendChild(wrapper);
      });
    }

    // 4. ISI DROPDOWN DARI DATA
    function populateFilters() {
      if (!districtSelect || !sportSelect) return;

      const districts = [''].concat(
        [...new Set(venues.map(v => v.district))]
      );
      districtSelect.innerHTML = districts
        .map(d => `<option value="${d}">${d === '' ? 'Pilih Kecamatan' : d}</option>`)
        .join('');

      const sports = [''].concat(
        [...new Set(venues.flatMap(v => v.sports))]
      );
      sportSelect.innerHTML = sports
        .map(s => `<option value="${s}">${s === '' ? 'Pilih Kategori Olahraga' : s}</option>`)
        .join('');
    }

    // 5. FILTER + SORT
    function filterAndRender() {
      let list = [...venues];

      const selectedDistrict = districtSelect ? districtSelect.value : '';
      const selectedSport    = sportSelect ? sportSelect.value : '';
      const selectedSort     = sortSelect ? sortSelect.value : '';

      if (selectedDistrict) {
        list = list.filter(v => v.district === selectedDistrict);
      }

      if (selectedSport) {
        list = list.filter(v => v.sports.includes(selectedSport));
      }

      if (selectedSort === 'name_asc') {
        list.sort((a, b) => a.name.localeCompare(b.name));
      } else if (selectedSort === 'name_desc') {
        list.sort((a, b) => b.name.localeCompare(a.name));
      }

      renderVenues(list);
    }

    populateFilters();
    filterAndRender();

    sortSelect     && sortSelect.addEventListener('change', filterAndRender);
    districtSelect && districtSelect.addEventListener('change', filterAndRender);
    sportSelect    && sportSelect.addEventListener('change', filterAndRender);
    searchBtn      && searchBtn.addEventListener('click', filterAndRender);

  } catch (e) {
    console.error('Init error:', e);
  }
});
