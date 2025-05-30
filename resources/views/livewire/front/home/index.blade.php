<div class="min-h-screen bg-void-DEFAULT">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl"></div>
    </div>

    <!-- Header Welcome Section -->
    <div class="container mx-auto px-6 py-8">
        <div class="terminal-box rounded-2xl p-8 mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-4">
                    @if($siswa && $siswa->foto)
                        <img src="{{ asset('storage/' . $siswa->foto) }}"
                             alt="Foto {{ $siswa->nama }}"
                             class="w-16 h-16 rounded-full border-2 border-cosmic-DEFAULT object-cover">
                    @else
                        <div class="w-16 h-16 rounded-full bg-cosmic-DEFAULT bg-opacity-20 flex items-center justify-center border-2 border-cosmic-DEFAULT">
                            <span class="text-cosmic-DEFAULT font-bold text-xl">
                                {{ $siswa ? substr($siswa->nama, 0, 1) : 'U' }}
                            </span>
                        </div>
                    @endif

                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-cosmic-light cyber-glow">
                            {{ $greeting }}, {{ $siswa->nama ?? 'Siswa' }}!
                        </h1>
                        <p class="text-gray-400 font-mono">
                            NIS: {{ $siswa->nis ?? '-' }} | {{ $siswa->email ?? Auth::user()->email ?? '-' }}
                        </p>
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
                        <p class="text-gray-400 text-sm">Total Hari PKL</p>
                        <p class="text-2xl font-bold text-cosmic-light">
                            @if($pkl)
                                {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays(\Carbon\Carbon::parse($pkl->selesai)) }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-cosmic-DEFAULT" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
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
                        <p class="text-gray-400 text-sm">Status PKL</p>
                        <p class="text-2xl font-bold
                            @if($siswa && $siswa->status_lapor_pkl == 1) text-green-400
                            @else text-red-400 @endif">
                            {{ $siswa && $siswa->status_lapor_pkl == 1 ? 'Sudah Lapor' : 'Belum Lapor' }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8
                            @if($siswa && $siswa->status_lapor_pkl == 1) text-green-400
                            @else text-red-400 @endif"
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
                        <p class="text-gray-400 text-sm">Quick Action</p>
                        @if($siswa && $siswa->status_lapor_pkl == 1)
                            <button wire:click="lihatLaporan"
                                    class="text-sm font-medium text-cosmic-DEFAULT hover:text-cosmic-light transition-colors">
                                Lihat Laporan
                            </button>
                        @else
                            <a href="{{ route('pkl') }}"
                               class="text-sm font-medium text-cosmic-DEFAULT hover:text-cosmic-light transition-colors">
                                Buat Laporan
                            </a>
                        @endif
                    </div>
                    <div class="w-12 h-12 bg-nebula bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-nebula" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
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
                    <h2 class="text-xl font-bold text-cosmic-light">Laporan PKL Terbaru</h2>
                    <span class="px-3 py-1 bg-cosmic-DEFAULT bg-opacity-20 text-cosmic-DEFAULT rounded-full text-sm font-medium">
                        Aktif
                    </span>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-cosmic-DEFAULT" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Guru Pembimbing</p>
                                <p class="text-white font-medium">{{ $pkl->guru->nama ?? '-' }}</p>
                                <p class="text-gray-500 text-sm">NIP: {{ $pkl->guru->nip ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-cosmic-DEFAULT" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Industri/Perusahaan</p>
                                <p class="text-white font-medium">{{ $pkl->industri->nama ?? '-' }}</p>
                                <p class="text-gray-500 text-sm">{{ $pkl->industri->bidang_usaha ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Tanggal Mulai</p>
                                <p class="text-green-400 font-medium">{{ \Carbon\Carbon::parse($pkl->mulai)->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-red-500 bg-opacity-20 rounded-lg flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Tanggal Selesai</p>
                                <p class="text-red-400 font-medium">{{ \Carbon\Carbon::parse($pkl->selesai)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="mt-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-gray-400">Progress PKL</span>
                        <span class="text-sm text-cosmic-DEFAULT font-medium">{{ number_format($progress, 1) }}%</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
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
                <div class="w-16 h-16 bg-cosmic-DEFAULT bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-cosmic-DEFAULT" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Belum Ada Laporan PKL</h3>
                <p class="text-gray-400 mb-6">Mulai buat laporan PKL pertama Anda sekarang!</p>
                <a href="{{ route('pkl') }}"
                    class="px-6 py-3 bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-lg text-void-DEFAULT font-bold hover:opacity-90 transition-all duration-300">
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
</div>