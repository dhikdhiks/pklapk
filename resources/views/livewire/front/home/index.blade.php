<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-red to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cyan-500 rounded-full opacity-10 blur-3xl dark:bg-cyan-600"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-purple-500 rounded-full opacity-10 blur-3xl dark:bg-purple-600"></div>
    </div>

    <!-- Header Welcome Section -->
    <div class="container mx-auto px-6 py-8">
        <div class="terminal-box rounded-2xl p-8 mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-4">
                    @if($siswa && $siswa->foto)
                        <img src="{{ asset('storage/' . $siswa->foto) }}"
                             alt="Foto {{ $siswa->nama }}"
                             class="w-16 h-16 rounded-full border-2 border-cyan-500 dark:border-cyan-400 object-cover">
                    @else
                        <div class="w-16 h-16 rounded-full bg-cyan-500 bg-opacity-20 flex items-center justify-center border-2 border-cyan-500 dark:border-cyan-400">
                            <span class="text-cyan-500 dark:text-cyan-400 font-bold text-xl">
                                {{ $siswa ? substr($siswa->nama, 0, 1) : 'U' }}
                            </span>
                        </div>
                    @endif

<div>
    @if (Auth::user()->hasRole('Guru'))
<h1 class="text-2xl md:text-3xl font-bold text-black dark:text-white cyber-glow">

           Halo, {{ $this->guru->nama ?? 'Guru' }}!
        </h1>
        <p class="text-gray-600 dark:text-gray-400 font-mono">
            NIP: {{ $guru->nip ?? '-' }} | {{ Auth::user()->email }}
        </p>
    @else
        <h1 class="text-2xl md:text-3xl font-bold text-dark  dark:text-white cyber-glow">
            {{ $greeting }}, {{ $siswa->nama ?? 'Siswa' }}!
        </h1>
        <p class="text-gray-600 dark:text-gray-400 font-mono">
            NIS: {{ $siswa->nis ?? '-' }} | {{ $siswa->email ?? Auth::user()->email ?? '-' }}
        </p>
    @endif
</div>

                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <!-- Total PKL -->
            <div class="terminal-box p-6 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Total Hari PKL</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            @if($pkl)
                                {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays(\Carbon\Carbon::parse($pkl->selesai)) }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-cyan-500 bg-opacity-20 rounded-lg flex items-center justify-center dark:bg-cyan-600 dark:bg-opacity-20">
                        <svg class="w-6 h-6 text-dark dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- PKL Aktif -->
            <div class="terminal-box p-6 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Status PKL</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400 @if(!$siswa || $siswa->status_lapor_pkl != 1) text-red-600 dark:text-red-400 @endif">
                            {{ $siswa && $siswa->status_lapor_pkl == 1 ? 'Sudah Lapor' : 'Belum Lapor' }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center dark:bg-green-600 dark:bg-opacity-20">
                        <svg class="w-8 h-8 text-daerk dark:text-white @if(!$siswa || $siswa->status_lapor_pkl != 1) text-red-600 dark:text-red-400 @endif"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Quick Action -->
            <div class="terminal-box p-6 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Quick Action</p>
                        @if (Auth::user()->hasRole('Guru'))
                            <span class="text-sm font-medium text-cyan-600 dark:text-cyan-400">Lihat Daftar Laporan</span>
                        @elseif ($siswa && $siswa->status_lapor_pkl == 1)
                            <span class="text-sm font-medium text-cyan-600 dark:text-cyan-400">Lihat Laporan</span>
                        @else
                            <span class="text-sm font-medium text-cyan-600 dark:text-cyan-400">Buat Laporan</span>
                        @endif
                    </div>
                    <div>
                        @if (Auth::user()->hasRole('Guru'))
                            <a href="{{ route('pkl') }}"
                               class="w-10 h-10 bg-purple-500 bg-opacity-20 rounded-lg flex items-center justify-center hover:bg-opacity-30 transition-colors dark:bg-purple-600 dark:bg-opacity-20">
                                <svg class="w-6 h-6 text-purple-500 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                        @elseif ($siswa && $siswa->status_lapor_pkl == 1)
                            <button wire:click="lihatLaporan"
                                    class="w-10 h-10 bg-purple-500 bg-opacity-20 rounded-lg flex items-center justify-center hover:bg-opacity-30 transition-colors dark:bg-purple-600 dark:bg-opacity-20">
                                <svg class="w-6 h-6 text-purple-500 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        @else
                            <a href="{{ route('pkl') }}"
                               class="w-10 h-10 bg-purple-500 bg-opacity-20 rounded-lg flex items-center justify-center hover:bg-opacity-30 transition-colors dark:bg-purple-600 dark:bg-opacity-20">
                                <svg class="w-6 h-6 text-purple-500 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4v16m8-8H4"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- PKL Information Card -->
        @if($pkl)
            @php
                $start = \Carbon\Carbon::parse($pkl->mulai);
                $end = \Carbon\Carbon::parse($pkl->selesai);
                $now = \Carbon\Carbon::now();
                $totalDays = $start->diffInDays($end);
                $passedDays = $start->diffInDays($now);
                $progress = $siswa && $siswa->status_lapor_pkl == 1 ? 100 : 0;
            @endphp
            <div class="terminal-box rounded-2xl p-8 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Laporan PKL Terbaru</h2>
                    <span class="px-3 py-1 bg-cyan-500 bg-opacity-20 text-dark dark:text-cyan-400 rounded-full dark:text-white text-sm font-medium dark:bg-cyan-600 dark:bg-opacity-20">
                        Aktif
                    </span>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-cyan-500 bg-opacity-20 rounded-lg flex items-center justify-center mt-1 dark:bg-cyan-600 dark:bg-opacity-20">
                                <svg class="w-4 h-4 text-cyan-500 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Guru Pembimbing</p>
                                <p class="text-gray-900 dark:text-white font-medium">{{ $pkl->guru->nama ?? '-' }}</p>
                                <p class="text-gray-500 dark:text-gray-500 text-sm">NIP: {{ $pkl->guru->nip ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-cyan-500 bg-opacity-20 rounded-lg flex items-center justify-center mt-1 dark:bg-cyan-600 dark:bg-opacity-20">
                                <svg class="w-4 h-4 text-cyan-500 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Industri/Perusahaan</p>
                                <p class="text-gray-900 dark:text-white font-medium">{{ $pkl->industri->nama ?? '-' }}</p>
                                <p class="text-gray-500 dark:text-gray-500 text-sm">{{ $pkl->industri->bidang_usaha ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mt-1 dark:bg-green-600 dark:bg-opacity-20">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Tanggal Mulai</p>
                                <p class="text-green-600 dark:text-green-400 font-medium">{{ \Carbon\Carbon::parse($pkl->mulai)->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-red-500 bg-opacity-20 rounded-lg flex items-center justify-center mt-1 dark:bg-red-600 dark:bg-opacity-20">
                                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Tanggal Selesai</p>
                                <p class="text-red-600 dark:text-red-400 font-medium">{{ \Carbon\Carbon::parse($pkl->selesai)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="mt-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Progress PKL</span>
                        <span class="text-sm text-cyan-600 dark:text-cyan-400 font-medium">{{ number_format($progress, 1) }}%</span>
                    </div>
                    <div class="w-full bg-gray-300 dark:bg-gray-700 rounded-full h-2">
                        <div
                            class="h-2 rounded-full transition-all duration-300
                                {{ $progress == 100 ? 'bg-green-500' : ($progress == 0 ? 'bg-red-500' : 'bg-yellow-400') }}"
                            style="width: {{ $progress }}%">
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- No PKL Card -->
            <div class="terminal-box rounded-2xl p-8 text-center">
                <div class="w-16 h-16 bg-cyan-500 bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 dark:bg-cyan-600 dark:bg-opacity-20">
                    <svg class="w-8 h-8 text-cyan-500 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Laporan PKL</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Mulai buat laporan PKL pertama Anda sekarang!</p>
                <a href="{{ route('pkl') }}"
                    class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-lg text-white dark:from-cyan-600 dark:to-purple-600 font-bold hover:opacity-90 transition-all duration-300">
                    Buat Laporan PKL
                    <svg class="w-4 h-4 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </a>
            </div>
        @endif

        <!-- Custom Styles -->
        <style>
            .cyber-glow {
                text-shadow: 0 0 10px rgba(0, 209, 224, 0.5);
            }
            .grid-pattern {
                background-image:
                    linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
                background-size: 24px 24px;
            }
            .dark .grid-pattern {
                background-image:
                    linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            }
            .terminal-box {
                background: rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(0, 0, 0, 0.1);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            }
            .dark .terminal-box {
                background: rgba(31, 41, 55, 0.8);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            }
            .terminal-box:hover {
                border-color: rgba(0, 209, 224, 0.5);
                box-shadow: 0 4px 30px rgba(0, 209, 224, 0.15);
            }
        </style>

        <!-- Tailwind Config Script -->
        <script>
            if (typeof tailwind !== 'undefined') {
                tailwind.config = {
                    theme: {
                        extend: {
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
</div>