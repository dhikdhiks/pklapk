<div class="py-24">
  {{-- Card --}}
  <div class="mx-auto bg-white dark:bg-zinc-900 rounded-lg shadow-md overflow-hidden px-4 py-4 max-w-7xl">

    {{-- Tampilan Pesan --}}
    <div>
      @if (session()->has('error'))
          <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
              class="p-4 bg-red-500 text-white rounded-md">
              {{ session('error') }}
          </div>
      @endif

      @if (session()->has('success'))
          <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
              class="p-4 bg-green-500 text-white rounded-md">
              {{ session('success') }}
          </div>
      @endif
    </div>

    {{-- Judul --}}
    <div class="w-full bg-gray-200 dark:bg-zinc-800 text-black dark:text-white p-4 text-center text-xl font-bold">
      Laporan Siswa PKL
    </div>

    {{-- Form Entry dan Search --}}
    <div class="flex items-center justify-between p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <!-- Tombol Create -->
        <button wire:click="create()" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            Create Lapor PKL
        </button>

        {{-- Modal Create --}}
        @if($isOpen)
            @include('livewire.front.pkl.create')
        @endif

        {{-- Search --}}
        <input wire:model.live="search" type="text" placeholder="Search ..." class="border border-gray-300 dark:border-zinc-600 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-zinc-800 text-black dark:text-white placeholder:text-gray-500 dark:placeholder:text-zinc-400">
    </div>

    {{-- Table PKL --}}
    <table class="min-w-full bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 mt-4 text-sm text-black dark:text-white">
      <thead class="bg-gray-100 dark:bg-zinc-800">
        <tr>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">No</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Nama Siswa</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Industri</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Bidang Usaha</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Guru Pembimbing</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Mulai</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Selesai</th>
          <th class="px-4 py-2 border-b text-left text-gray-600 dark:text-zinc-300">Durasi (Hari)</th>
        </tr>
      </thead>

      <tbody>
        @foreach($pkls as $pkl)
          @php
            $d1 = \Carbon\Carbon::parse($pkl->mulai);
            $d2 = \Carbon\Carbon::parse($pkl->selesai);
            $selisihHari = $d1->diffInDays($d2);
          @endphp
          <tr class="hover:bg-gray-50 dark:hover:bg-zinc-800">
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $loop->iteration }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $pkl->siswa->nama }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $pkl->industri->nama }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $pkl->industri->bidang_usaha }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $pkl->guru->nama }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $d1->translatedFormat('d F Y') }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $d2->translatedFormat('d F Y') }}</td>
            <td class="px-4 py-2 border-b border-gray-200 dark:border-zinc-700">{{ $selisihHari }} Hari</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Pagination --}}
    <div class="p-4 flex justify-center text-black dark:text-white">
      {{ $pkls->links() }}
    </div>
  </div>
</div>
