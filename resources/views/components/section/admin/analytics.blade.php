@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'unreadContacts' => [],
    'recentNews' => [],
    'recentContacts' => [],
    'featuredNews' => [],
    'activity' => ['news' => [], 'gallery' => [], 'contact' => []],
    'days' => 30,
])

@php
  $chartColors = [
      'news' => '#111827',
      'gallery' => '#ca8a04',
      'contact' => '#6b7280',
  ];

  $lineOrder = ['gallery', 'contact', 'news'];
  $lineLabels = ['gallery' => 'Galeri', 'contact' => 'Kontak', 'news' => 'Berita'];

  $dates = array_map(fn($row) => $row['date'], $activity['news']);

  $lineSeries = [];
  foreach ($lineOrder as $key) {
      $lineSeries[] = [
          'name' => $lineLabels[$key],
          'data' => array_map(fn($row) => $row['count'], $activity[$key]),
      ];
  }
@endphp

<div class="mt-14 min-h-screen p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50"
  data-aos-duration="400">
  <div class="w-full">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between md:mb-10" data-aos="fade-down"
      data-aos-delay="80" data-aos-duration="300">
      <p class="text-2xl font-bold sm:text-3xl lg:text-4xl">Dashboard</p>
      <div class="flex flex-col gap-3 sm:flex-row">
        <a class="w-full bg-gray-900 px-6 py-2.5 text-center text-sm font-semibold text-gray-50 hover:bg-gray-600 sm:w-auto"
          data-aos="fade-left" data-aos-delay="100" data-aos-duration="400" href="{{ route('admin.news.index') }}">
          + Buat Berita
        </a>
        <a class="w-full border bg-white px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto"
          data-aos="fade-left" data-aos-delay="150" data-aos-duration="400" href="{{ route('admin.gallery.index') }}">
          + Upload Foto
        </a>
      </div>
    </div>

    {{-- Statistik --}}
    <section class="mb-6 md:mb-10" data-aos="fade-up" data-aos-delay="100" data-aos-duration="400">
      <p class="mb-4 text-lg font-semibold sm:text-xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">
        Statistik</p>
      <div class="grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-4">
        <x-ui.stat-card :route="route('admin.news.index')" label="Total Berita" :value="$news" />
        <x-ui.stat-card :route="route('admin.gallery.index')" label="Total Galeri" :value="$galleries" />
        <x-ui.stat-card :route="route('admin.contact.index')" label="Total Kontak" :value="$contacts" />
        <x-ui.stat-card :route="route('admin.contact.index')" label="Belum Dibaca" :value="$unreadContacts" />
      </div>
    </section>

    {{-- Charts --}}
    <section class="mb-6 md:mb-10" data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
      <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-lg font-semibold sm:text-xl">Analitik</p>
        <form method="GET" action="{{ route('admin.dashboard') }}">
          <select class="border border-gray-300 bg-white py-1.5 text-sm focus:outline-none" name="days"
            onchange="this.form.submit()">
            @foreach ([7, 14, 30, 90] as $option)
              <option value="{{ $option }}" {{ $days == $option ? 'selected' : '' }}>
                {{ $option }} hari
              </option>
            @endforeach
          </select>
        </form>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-3">
        <div class="border border-gray-300 bg-white p-4 sm:p-6 lg:col-span-2">
          <p class="mb-3 text-sm font-bold">Aktivitas Upload</p>
          <div id="activityLineChart"></div>
        </div>

        <div class="border border-gray-300 bg-white p-4 sm:p-6">
          <p class="mb-3 text-sm font-bold">Perbandingan Data</p>
          <div id="comparisonDonutChart"></div>
        </div>
      </div>
    </section>

    {{-- Aksi Cepat --}}
    <section class="mb-6 md:mb-10" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
      <p class="mb-4 text-lg font-semibold sm:text-xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">
        Aksi Cepat</p>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
        <div class="bg-white border-gray-300 shadow-xs border p-4 sm:p-6" data-aos="fade-up"
          data-aos-delay="100" data-aos-duration="400">
          <p class="mb-2 font-semibold">Kelola Berita</p>
          <p class="mb-4 text-sm text-gray-600">Tambah, edit, atau hapus berita</p>
          <a class="inline-block w-full border px-6 py-2 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto"
            href="{{ route('admin.news.index') }}">
            Buka Manajemen
          </a>
        </div>
        <div class="bg-white border-gray-300 shadow-xs border p-4 sm:p-6" data-aos="fade-up"
          data-aos-delay="140" data-aos-duration="400">
          <p class="mb-2 font-semibold">Kelola Galeri</p>
          <p class="mb-4 text-sm text-gray-600">Upload dan kelola foto galeri</p>
          <a class="inline-block w-full border px-6 py-2 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto"
            href="{{ route('admin.gallery.index') }}">
            Buka Manajemen
          </a>
        </div>
        <div class="bg-white border-gray-300 shadow-xs border p-4 sm:p-6" data-aos="fade-up"
          data-aos-delay="180" data-aos-duration="400">
          <p class="mb-2 font-semibold">Kelola Kontak</p>
          <p class="mb-4 text-sm text-gray-600">{{ $unreadContacts }} pesan belum dibaca</p>
          <a class="inline-block w-full border px-6 py-2 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto"
            href="{{ route('admin.contact.index') }}">
            Buka Manajemen
          </a>
        </div>
      </div>
    </section>

    {{-- Berita Terbaru --}}
    <section class="mb-6 md:mb-10" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
      <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
        <p class="mb-2 text-lg font-semibold sm:mb-4 sm:text-xl" data-aos="fade-down" data-aos-delay="80"
          data-aos-duration="300">Berita Terbaru</p>
        <a class="mb-2 text-sm text-gray-600 hover:underline sm:mb-4" href="{{ route('admin.news.index') }}">Lihat
          semua</a>
      </div>
      <div class="bg-white border-gray-300 shadow-xs border">
        @forelse($recentNews as $newsItem)
          <div class="border-gray-300 hover:bg-gray-100 border-b p-3 last:border-b-0 sm:p-4"
            data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 50 }}" data-aos-duration="300">
            <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
              <div>
                <p class="text-sm font-medium ">{{ $newsItem->title }}</p>
                <p class="text-xs text-gray-600 sm:text-sm">{{ $newsItem->created_at->diffForHumans() }}
                </p>
              </div>
              <div class="flex w-full items-center justify-between gap-3 sm:w-auto">
                @if ($newsItem->is_featured)
                  <span class="bg-yellow-100 px-2 py-1 text-xs text-yellow-800 sm:px-3">Featured</span>
                @endif
                <a class="text-sm text-yellow-600 hover:underline"
                  href="{{ route('admin.news.edit', $newsItem->id) }}">Edit</a>
              </div>
            </div>
          </div>
        @empty
          <div class="p-4 text-center text-gray-500">Belum ada berita</div>
        @endforelse
      </div>
    </section>

    {{-- Pesan Terbaru --}}
    <section class="mb-6 md:mb-10" data-aos="fade-up" data-aos-delay="250" data-aos-duration="400">
      <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
        <p class="mb-2 text-lg font-semibold sm:mb-4 sm:text-xl" data-aos="fade-down" data-aos-delay="80"
          data-aos-duration="300">Pesan Terbaru</p>
        <a class="mb-2 text-sm text-gray-600 hover:underline sm:mb-4" href="{{ route('admin.contact.index') }}">Lihat
          semua</a>
      </div>
      <div class="bg-white border-gray-300 shadow-xs border">
        @forelse($recentContacts as $contact)
          <div class="border-gray-300 hover:bg-gray-100 border-b p-3 last:border-b-0 sm:p-4"
            data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 50 }}" data-aos-duration="300">
            <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
              <div>
                <p class="text-sm font-medium ">{{ $contact->name }}</p>
                <p class="text-xs text-gray-600 sm:text-sm">{{ Str::limit($contact->subject, 30) }}
                </p>
                <p class="text-xs text-gray-500">{{ $contact->created_at->diffForHumans() }}</p>
              </div>
              <div>
                @if (!$contact->is_read)
                  <span class="bg-yellow-100 px-2 py-1 text-xs text-yellow-800 sm:px-3">Baru</span>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="p-4 text-center text-gray-500">Belum ada pesan</div>
        @endforelse
      </div>
    </section>

    {{-- Berita Unggulan --}}
    @if ($featuredNews && count($featuredNews) > 0)
      <section data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
        <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
          <p class="mb-2 text-lg font-semibold sm:mb-4 sm:text-xl" data-aos="fade-down" data-aos-delay="80"
            data-aos-duration="300">Berita Unggulan</p>
          <a class="mb-2 text-sm text-gray-600 hover:underline sm:mb-4" href="{{ route('admin.news.index') }}">Lihat
            semua</a>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
          @foreach ($featuredNews as $newsItem)
            <div class="bg-white border-gray-300 shadow-xs overflow-hidden border" data-aos="zoom-in"
              data-aos-delay="{{ 100 + $loop->index * 80 }}" data-aos-duration="400">
              @if ($newsItem->image)
                <img class="h-40 w-full object-cover sm:h-48"
                  src="{{ asset('uploaded_images/' . $newsItem->image) }}" alt="{{ $newsItem->title }}">
              @endif
              <div class="p-3 sm:p-4">
                <p class="mb-2 text-sm font-medium ">{{ $newsItem->title }}</p>
                <p class="mb-3 text-xs text-gray-600 sm:text-sm">
                  {{ Str::limit($newsItem->content, 80) }}</p>
                <div class="flex flex-wrap items-center gap-3">
                  <a class="text-sm text-yellow-600 hover:underline"
                    href="{{ route('admin.news.edit', $newsItem->id) }}">Edit</a>
                  <span class="text-sm text-gray-300">|</span>
                  <span class="text-xs text-gray-500">{{ $newsItem->created_at->format('d M Y') }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    @endif
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.54.1/dist/apexcharts.min.js"></script>
<script>
  (function() {
    var dates = @json($dates);
    var lineSeries = @json($lineSeries);
    var colors = @json(array_values(array_map(fn($k) => $chartColors[$k], $lineOrder)));

    var donutSeries = [{{ (int) $news }}, {{ (int) $galleries }}, {{ (int) $contacts }}];

    // Line chart
    var allCounts = lineSeries.flatMap(function(s) {
      return s.data;
    });
    var maxCount = allCounts.length ? Math.max.apply(null, allCounts) : 0;
    var maxY = maxCount < 1 ? 5 : maxCount + 2;

    new ApexCharts(document.querySelector('#activityLineChart'), {
      chart: {
        type: 'line',
        height: 300,
        fontFamily: 'Montserrat, sans-serif',
        toolbar: {
          show: false
        },
        zoom: {
          enabled: false
        },
        selection: {
          enabled: false
        },
        animations: {
          enabled: true
        }
      },
      series: lineSeries,
      colors: colors,
      stroke: {
        curve: 'straight',
        width: 3
      },
      markers: {
        size: 0
      },
      dataLabels: {
        enabled: false
      },
      grid: {
        xaxis: {
          lines: {
            show: false
          }
        },
        borderColor: '#e5e7eb'
      },
      xaxis: {
        categories: dates.map(function(d) {
          var dt = new Date(d + 'T00:00:00');
          return dt.getDate() + '/' + (dt.getMonth() + 1);
        }),
        tickAmount: Math.min(dates.length - 1, 5),
        labels: {
          style: {
            fontSize: '10px',
            colors: '#6b7280'
          },
          rotate: 0
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        min: 0,
        max: maxY,
        tickAmount: 4,
        labels: {
          formatter: function(v) {
            return Math.round(v);
          }
        }
      },
      legend: {
        position: 'bottom',
        fontSize: '13px',
        markers: {
          width: 14,
          height: 14,
          radius: 0
        }
      },
      tooltip: {
        theme: 'light'
      }
    }).render();

    // Donut chart
    new ApexCharts(document.querySelector('#comparisonDonutChart'), {
      chart: {
        type: 'donut',
        height: 300,
        fontFamily: 'Montserrat, sans-serif'
      },
      series: donutSeries,
      labels: ['Berita', 'Galeri', 'Kontak'],
      colors: [colors[2], colors[0], colors[1]], // news, gallery, contact
      stroke: {
        width: 3,
        colors: ['#ffffff']
      },
      legend: {
        position: 'bottom',
        fontSize: '13px',
        markers: {
          width: 14,
          height: 14,
          radius: 0
        }
      },
      dataLabels: {
        enabled: true,
        style: {
          fontSize: '10px',
          fontWeight: 'bold',
          colors: ['#ffffff']
        },
        formatter: function(val) {
          return Math.round(val) + '%';
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '50%'
          }
        }
      },
      tooltip: {
        theme: 'light'
      }
    }).render();
  })();
</script>
