document.addEventListener('DOMContentLoaded', function () {
  try {
    console.log('home.js OK');

    const venues = [
      { id: 1, name: 'GOR PKPSO Kaliwates', location: 'Kaliwates, Jember', sports: ['Badminton','Basket','Voli'], price: 75000, rating: 4.8, imageUrl: 'https://placehold.co/600x400/3b82f6/ffffff?text=GOR+PKPSO' },
      { id: 2, name: 'Lapangan Futsal Gebang', location: 'Gebang, Jember', sports: ['Futsal'], price: 120000, rating: 4.5, imageUrl: 'https://placehold.co/600x400/16a34a/ffffff?text=Futsal+Gebang' },
      { id: 3, name: 'Mumbul Garden Badminton Hall', location: 'Mumbulsari, Jember', sports: ['Badminton'], price: 50000, rating: 4.7, imageUrl: 'https://placehold.co/600x400/f97316/ffffff?text=Mumbul+Garden' }
    ];

    const sortSelect     = document.getElementById('sort-by');
    const districtSelect = document.getElementById('district-select');
    const sportSelect    = document.getElementById('sport-select');
    const searchBtn      = document.getElementById('search-btn');
    const venueList      = document.getElementById('venue-list');
    const noResults      = document.getElementById('no-results');

    if (!venueList) { console.error('#venue-list tidak ditemukan'); return; }

    function renderVenues(list) {
      venueList.innerHTML = '';
      if (!list.length) {
        noResults && noResults.classList.remove('hidden');
        return;
      }
      noResults && noResults.classList.add('hidden');

      list.forEach(v => {
        const firstSport = v.sports[0] || '';
        const el = document.createElement('article');
        el.className = 'bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100';
        el.innerHTML = `
          <div class="relative">
            <img class="w-full h-44 object-cover" src="${v.imageUrl}" alt="${v.name}" loading="lazy">
          </div>
          <div class="p-4">
            <span class="text-xs text-gray-500">Venue</span>
            <h3 class="text-lg md:text-xl font-semibold text-gray-900 mt-0.5">${v.name}</h3>
            <div class="mt-1 flex items-center gap-2 text-sm text-gray-600">
              <i class="fa-solid fa-star"></i>
              <span class="font-medium">${v.rating.toFixed(2)}</span>
              <span class="text-gray-400">•</span>
              <i class="fa-solid fa-location-dot"></i>
              <span>${v.location}</span>
            </div>
            <div class="mt-2 text-sm text-gray-600">${firstSport}</div>
            <div class="mt-4 text-sm">
              <span class="text-gray-500">Mulai </span>
              <span class="font-semibold text-gray-900">Rp${v.price.toLocaleString('id-ID')}</span>
              <span class="text-gray-500">/sesi</span>
            </div>
          </div>`;
        venueList.appendChild(el);
      });
    }

    function populateFilters() {
      if (!districtSelect || !sportSelect) return;
      const districts = ['Semua', ...new Set(venues.map(v => (v.location.split(',')[0] || '').trim()))];
      districtSelect.innerHTML = districts.map(d => `<option value="${d}">${d === 'Semua' ? 'Pilih Kecamatan' : d}</option>`).join('');
      const sports = ['Semua', ...new Set(venues.flatMap(v => v.sports))];
      sportSelect.innerHTML = sports.map(s => `<option value="${s}">${s === 'Semua' ? 'Pilih Kategori Olahraga' : s}</option>`).join('');
    }

    function filterAndRender() {
      let f = [...venues];
      // tambahkan filter kalau perlu
      renderVenues(f);
    }

    populateFilters();
    filterAndRender();

    sortSelect    && sortSelect.addEventListener('change', filterAndRender);
    districtSelect&& districtSelect.addEventListener('change', filterAndRender);
    sportSelect   && sportSelect.addEventListener('change', filterAndRender);
    searchBtn     && searchBtn.addEventListener('click',  filterAndRender);

  } catch (e) {
    console.error('Init error:', e);
  }
});
