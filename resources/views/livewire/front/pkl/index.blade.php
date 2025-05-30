<div class="min-h-screen bg-void-DEFAULT">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <!-- Card -->
        <div class="terminal-box rounded-lg p-6 max-w-7xl mx-auto">
            <!-- Tampilan Pesan -->
            <div>
                @if (session()->has('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="p-4 bg-red-500 bg-opacity-20 text-red-400 rounded-md font-mono">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="p-4 bg-green-500 bg-opacity-20 text-green-400 rounded-md font-mono">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!-- Judul -->
            <div class="w-full bg-gradient-to-r from-cosmic-DEFAULT to-nebula p-4 text-center text-xl font-bold text-white cyber-glow font-grotesk">
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
               border border-black dark:border-white">
        Create Lapor PKL
    </button>
@endunless


                <!-- Search -->
               <input wire:model.debounce.300ms="search" type="text" placeholder="Search ..."
       class="border border-cosmic-DEFAULT border-opacity-30 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT bg-void-light bg-opacity-10 text-cosmic-light font-mono placeholder:text-gray-400">

            </div>

            <!-- Create Form Card -->
            @if($isOpen)
                <div class="terminal-box rounded-lg p-6 max-w-lg mx-auto mt-6">
                    <!-- Judul -->
                    <div class="w-full bg-gradient-to-r from-cosmic-DEFAULT to-nebula p-4 text-center text-xl font-bold text-white cyber-glow font-grotesk">
                        Lapor PKL
                    </div>
                    <div class="py-4 px-6">
                        <span class="text-gray-400 font-mono">{{ $siswa_login->nama }}</span>
                        <div class="border-t border-cosmic-DEFAULT border-opacity-30 my-2"></div>
                    </div>
                    <form>
                        <div class="px-6 pt-5 pb-4">
                            <div>
                                <fieldset class="border border-cosmic-DEFAULT border-opacity-30 rounded-md p-4">
                                    <legend class="text-lg text-gray-400 font-mono px-2">Siswa</legend>
                                    <div class="mb-4">
                                        <select wire:model="siswaId" class="mt-1 p-2 border border-cosmic-DEFAULT border-opacity-30 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT bg-void-light bg-opacity-10 text-cosmic-light font-mono">
                                            <option value="" class="text-gray-400">Pilih Siswa</option>
                                            <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                                        </select>
                                        @error('siswaId') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="border border-cosmic-DEFAULT border-opacity-30 rounded-md p-4">
                                    <legend class="text-lg text-gray-400 font-mono px-2">Industri</legend>
                                    <div class="mb-4">
                                        <select wire:model="industriId" class="mt-1 p-2 border border-cosmic-DEFAULT border-opacity-30 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT bg-void-light bg-opacity-10 text-cosmic-light font-mono">
                                            <option value="" class="text-gray-400">Pilih Industri</option>
                                            @foreach ($industris as $industri)
                                                <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('industriId') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="border border-cosmic-DEFAULT border-opacity-30 rounded-md p-4">
                                    <legend class="text-lg text-gray-400 font-mono px-2">Guru Pembimbing</legend>
                                    <div class="mb-4">
                                        <select wire:model="guruId" class="mt-1 p-2 border border-cosmic-DEFAULT border-opacity-30 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT bg-void-light bg-opacity-10 text-cosmic-light font-mono">
                                            <option value="" class="text-gray-400">Pilih Guru Pembimbing PKL</option>
                                            @foreach ($gurus as $guru)
                                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('guruId') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="border border-cosmic-DEFAULT border-opacity-30 rounded-md p-4">
                                    <legend class="text-lg text-gray-400 font-mono px-2">Pelaksanaan PKL</legend>
                                    <div class="mb-4">
                                        <label for="Mulai" class="block mb-2 text-sm font-bold text-gray-400 font-mono">Mulai</label>
                                        <input wire:model="mulai" type="date" id="start-date" name="start-date" class="mt-1 p-2 border border-cosmic-DEFAULT border-opacity-30 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT bg-void-light bg-opacity-10 text-cosmic-light font-mono">
                                        @error('mulai') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="Selesai" class="block mb-2 text-sm font-bold text-gray-400 font-mono">Selesai</label>
                                        <input wire:model="selesai" type="date" id="end-date" name="end-date" class="mt-1 p-2 border border-cosmic-DEFAULT border-opacity-30 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-cosmic-DEFAULT bg-void-light bg-opacity-10 text-cosmic-light font-mono">
                                        @error('selesai') <span class="text-red-400 font-mono">{{ $message }}</span>@enderror
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="px-6 py-3 bg-void-light bg-opacity-10 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-md hover:opacity-90 font-grotesk">
                                    Save
                                </button>
                            </span>
                            <span class="flex w-full mt-3 rounded-md sm:mt-0 sm:w-auto">
                                <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-gray-400 border border-cosmic-DEFAULT border-opacity-30 rounded-md hover:text-cosmic-light bg-void-light bg-opacity-10 font-grotesk">
                                    Cancel
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            @endif

            <!-- Table PKL -->
            <table class="min-w-full terminal-box mt-4 text-sm text-cosmic-light font-mono">
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
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $pkl->siswa->nama }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $pkl->industri->nama }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $pkl->industri->bidang_usaha }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $pkl->guru->nama }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $d1->translatedFormat('d F Y') }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $d2->translatedFormat('d F Y') }}</td>
                            <td class="px-4 py-2 border-b border-cosmic-DEFAULT border-opacity-30">{{ $selisihHari }} Hari</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="p-4 flex justify-center text-cosmic-light font-mono">
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
                linear-gradient(to right, rgba(124, 58, 237, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(124, 58, 237, 0.1) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .terminal-box {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(124, 58, 237, 0.3);
            box-shadow: 0 0 40px rgba(124, 58, 237, 0.1);
            backdrop-filter: blur(10px);
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