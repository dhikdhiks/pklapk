<div class="min-h-screen bg-void-DEFAULT">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-cosmic-light cyber-glow mb-6 font-grotesk">Kartu Pelajar - Data Siswa</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($siswas as $siswa)
                <div class="terminal-box rounded-2xl p-6 border border-cosmic-DEFAULT border-opacity-30 flex flex-col h-full">
                    <div class="flex flex-col items-center p-4 flex-1">
                        <!-- Foto -->
                        <img src="{{ $siswa->user?->image ? asset('storage/' . $siswa->user->image) : 'https://i.ibb.co/HfrkvwSK/noimage.jpg' }}"
                             alt="{{ $siswa->nama }}"
                             class="w-32 h-32 rounded-full object-cover border-4 border-cosmic-DEFAULT shadow mb-4">
                        <!-- Nama -->
                        <h3 class="text-xl font-bold text-cosmic-light text-center mb-1 min-h-[3rem] leading-snug font-grotesk">{{ $siswa->nama }}</h3>
                        <div class="mb-4"></div>
                        <!-- Informasi siswa -->
                        <div class="flex flex-col justify-between flex-1 w-full">
                            <div class="w-full text-left space-y-1 text-sm text-gray-400 font-mono min-h-[140px]">
                                <p><span class="font-semibold text-cosmic-DEFAULT">NIS:</span> {{ $siswa->nis }}</p>
                                <p><span class="font-semibold text-cosmic-DEFAULT">Email:</span> {{ $siswa->email }}</p>
                                <p><span class="font-semibold text-cosmic-DEFAULT">Gender:</span> {{ $siswa->gender }}</p>
                                <p><span class="font-semibold text-cosmic-DEFAULT">Kontak:</span> {{ $siswa->kontak }}</p>
                                <p><span class="font-semibold text-cosmic-DEFAULT">Alamat:</span> {{ $siswa->alamat }}</p>
                            </div>
                            <!-- Status -->
                            <div class="mt-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full
                                    {{ $siswa->status_lapor_pkl ? 'bg-green-500 bg-opacity-20 text-green-400' : 'bg-red-500 bg-opacity-20 text-red-400' }}">
                                    @if ($siswa->status_lapor_pkl)
                                        <svg class="w-4 h-4 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Sudah Lapor
                                    @else
                                        <svg class="w-4 h-4 mr-1 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Belum Lapor
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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