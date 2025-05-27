<div>
    <h2 class="text-2xl font-bold mb-6">Data Siswa</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($siswas as $siswa)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border dark:bg-gray-800 dark:border-gray-700">
                <img src="{{ $siswa->user?->image ? asset('storage/' . $siswa->user->image) : asset('images/default-profile.png') }}"
                     alt="{{ $siswa->nama }}"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $siswa->nama }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">NIS: {{ $siswa->nis }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Email: {{ $siswa->email }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Gender: {{ $siswa->gender }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Kontak: {{ $siswa->kontak }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
