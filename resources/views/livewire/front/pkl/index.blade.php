<div class="min-h-screen bg-void-DEFAULT dark:bg-void-dark">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light dark:from-void-dark dark:via-gray-800 dark:to-gray-700 opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl dark:bg-cosmic-light"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl dark:bg-nebula"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <!-- Card -->
        <div class="terminal-box rounded-lg p-6 max-w-7xl mx-auto">
            <!-- Tampilan Pesan -->
            <div>
                @if (session()->has('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="p-4 bg-red-500 bg-opacity-20 text-red-400 dark:bg-red-600 dark:bg-opacity-30 dark:text-red-300 rounded-md font-mono">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="p-4 bg-green-500 bg-opacity-20 text-green-400 dark:bg-green-600 dark:bg-opacity-30 dark:text-green-300 rounded-md font-mono">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!-- Judul -->
   <div class="w-full bg-gradient-to-r from-cosmic-DEFAULT to-nebula p-4 text-center text-xl font-bold text-black dark:text-white cyber-glow font-grotesk">
    Laporan Siswa PKL
</div>


            <!-- Form Entry dan Search -->
            <div class="flex items-center justify-between p-6 terminal-box rounded-lg mt-4">
                <!-- Tombol Create -->
                @unless(Auth::user()->hasRole('Guru') || ($siswa_login && $siswa_login->status_lapor_pkl == 1))
                    <button 
                        wire:click="create()" 
                        class="px-4 py-2 bg-gradient-to-r from-cosmic-DEFAULT to-nebula text-white 
                               rounded-lg hover:opacity-90 font-grotesk 
                               border border-gray-300 dark:border-gray-600">
                        Create Lapor PKL
                    </button>
                @endunless

                <!-- Search -->
                <div class="flex items-center w-full sm:w-1/2">
                    <input
                        type="text"
                        wire:model.debounce.300ms="search"
                        placeholder="Cari siswa, industri, bidang usaha, guru, atau tanggal..."
                        class="w-full p-2 bg-transparent border border-cosmic-DEFAULT text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 rounded-l-md focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT dark:focus:ring-cosmic-light"
                    />
<button
    wire:click="searchData"
    class="px-4 py-2 bg-gradient-to-r from-cosmic-DEFAULT to-nebula text-black dark:text-white rounded-r-md hover:opacity-90 font-grotesk border border-gray-300 dark:border-gray-600 transition-colors duration-300"
>
    Cari
</button>

                    <button
                        wire:click="clearSearch"
                        class="ml-2 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 font-grotesk border border-gray-300 dark:border-gray-600"
                    >
                        Bersihkan
                    </button>
                </div>
            </div>

            <!-- Create Form Card -->
            @if($isOpen)
                <div class="terminal-box rounded-lg p-6 max-w-lg mx-auto mt-6">
                    <!-- Judul -->
                    <div class="w-full bg-gradient-to-r from-cosmic-DEFAULT to-nebula p-4 text-center text-xl font-bold text-white cyber-glow font-grotesk">
                        Lapor PKL
                    </div>
                    <form>
                        <div class="px-6 pt-5 pb-4">
                            <div>
                                <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4">
                                    <legend class="text-lg text-gray-600 dark:text-gray-400 font-mono px-2">Siswa</legend>
                                    <div class="mb-4">
                                        <select wire:model="siswaId" class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT dark:focus:ring-cosmic-light bg-white dark:bg-gray-800 text-gray-900 dark:text-cosmic-light font-mono">
                                            <option value="" class="text-gray-500 dark:text-gray-400">Pilih Siswa</option>
                                            <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                                        </select>
                                        @error('siswaId') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4">
                                    <legend class="text-lg text-gray-600 dark:text-gray-400 font-mono px-2">Industri</legend>
                                    <div class="mb-4">
                                        <select wire:model="industriId" class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT dark:focus:ring-cosmic-light bg-white dark:bg-gray-800 text-gray-900 dark:text-cosmic-light font-mono">
                                            <option value="" class="text-gray-500 dark:text-gray-400">Pilih Industri</option>
                                            @foreach ($industris as $industri)
                                                <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('industriId') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4">
                                    <legend class="text-lg text-gray-600 dark:text-gray-400 font-mono px-2">Guru Pembimbing</legend>
                                    <div class="mb-4">
                                        <select wire:model="guruId" class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT dark:focus:ring-cosmic-light bg-white dark:bg-gray-800 text-gray-900 dark:text-cosmic-light font-mono">
                                            <option value="" class="text-gray-500 dark:text-gray-400">Pilih Guru Pembimbing PKL</option>
                                            @foreach ($gurus as $guru)
                                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('guruId') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4">
                                    <legend class="text-lg text-gray-600 dark:text-gray-400 font-mono px-2">Pelaksanaan PKL</legend>
                                    <div class="mb-4">
                                        <label for="Mulai" class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400 font-mono">Mulai</label>
                                        <input wire:model="mulai" type="date" id="start-date" name="start-date" class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT dark:focus:ring-cosmic-light bg-white dark:bg-gray-800 text-gray-900 dark:text-cosmic-light font-mono">
                                        @error('mulai') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="Selesai" class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400 font-mono">Selesai</label>
                                        <input wire:model="selesai" type="date" id="end-date" name="end-date" class="mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT dark:focus:ring-cosmic-light bg-white dark:bg-gray-800 text-gray-900 dark:text-cosmic-light font-mono">
                                        @error('selesai') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="px-6 py-3 bg-gray-100 dark:bg-gray-800 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-md hover:opacity-90 font-grotesk">
                                    Save
                                </button>
                            </span>
                            <span class="flex w-full mt-3 rounded-md sm:mt-0 sm:w-auto">
                                <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-gray-600 dark:text-gray-400 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 bg-white dark:bg-gray-800 font-grotesk">
                                    Cancel
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            @endif

            <!-- Table PKL -->
            @if($pkls->isEmpty())
                <div class="p-4 bg-yellow-500 bg-opacity-20 text-yellow-600 dark:bg-yellow-600 dark:bg-opacity-30 dark:text-yellow-300 rounded-md font-mono text-center">
                    Tidak ada data yang ditemukan untuk pencarian "{{ $search }}".
                </div>
            @endif
            <table class="min-w-full terminal-box mt-4 text-sm text-gray-900 dark:text-cosmic-light font-mono">
                <thead class="bg-gradient-to-r from-cosmic-DEFAULT to-nebula">
                    <tr>
                        <th class="px-4 py-2 text-left text-white font-grotesk">No</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Nama Siswa</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Industri</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Bidang Usaha</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Guru Pembimbing</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Mulai</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Selesai</th>
                        <th class="px-4 py-2 text-left text-white font-grotesk">Durasi (Hari)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pkls as $pkl)
                        @php
                            $d1 = \Carbon\Carbon::parse($pkl->mulai);
                            $d2 = \Carbon\Carbon::parse($pkl->selesai);
                            $selisihHari = $d1->diffInDays($d2);
                        @endphp
                        <tr class="hover:bg-cosmic-DEFAULT hover:bg-opacity-10">
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $pkl->siswa->nama }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $pkl->industri->nama }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $pkl->industri->bidang_usaha }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $pkl->guru->nama }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $d1->translatedFormat('d F Y') }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $d2->translatedFormat('d F Y') }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600 dark:text-white">{{ $selisihHari }} Hari</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="p-4 flex justify-center text-gray-900 dark:text-cosmic-light font-mono">
                {{ $pkls->links() }}
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .cyber-glow {
            text-shadow: 0 0 10px rgba(110, 231, 242, 0.7);
        }
        .grid-pattern {
            background-image:
                linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .dark .grid-pattern {
            background-image:
                linear-gradient(to right, rgba(124, 58, 237, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(124, 58, 237, 0.1) 1px, transparent 1px);
        }
        .terminal-box {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .dark .terminal-box {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(124, 58, 237, 0.3);
            box-shadow: 0 0 40px rgba(124, 58, 237, 0.1);
        }
        .terminal-box:hover {
            border-color: rgba(0, 209, 224, 0.5);
            box-shadow: 0 0 60px rgba(0, 209, 224, 0.15);
        }
    </style>

    <!-- Tailwind Config Script -->
    <script>
        if (typeof tailwind !== 'undefined') {
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            cosmic: {
                                light: '#6EE7F2',
                                DEFAULT: '#00D1E0',
                                dark: '#00A3B5',
                            },
                            void: {
                                light: '#1E293B',
                                DEFAULT: '#0F172A',
                                dark: '#020617',
                            },
                            nebula: '#7C3AED'
                        },
                        fontFamily: {
                            grotesk: ['Space Grotesk', 'sans-serif'],
                            mono: ['Space Mono', 'monospace'],
                        }
                    }
                }
            }
        }
    </script>
</div>