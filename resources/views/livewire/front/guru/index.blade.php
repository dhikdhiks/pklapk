<div class="min-h-screen bg-void-DEFAULT">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-cosmic-light cyber-glow mb-6 font-grotesk">Daftar Guru</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($gurus as $guru)
                <div class="terminal-box rounded-xl p-6 transform transition hover:scale-105">
                    <div class="bg-gradient-to-r from-cosmic-DEFAULT to-nebula p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold text-white font-grotesk">{{ $guru->nama }}</h2>
                        <p class="text-sm text-gray-400 font-mono">NIP: {{ $guru->nip }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 font-mono text-sm"><strong>Alamat:</strong> {{ $guru->alamat }}</p>
                        <p class="text-gray-400 font-mono text-sm"><strong>Gender:</strong> {{ $guru->gender }}</p>
                        <p class="text-gray-400 font-mono text-sm"><strong>Email:</strong> {{ $guru->email }}</p>
                        <p class="text-gray-400 font-mono text-sm"><strong>Jumlah PKL:</strong> {{ $guru->pkls->count() }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 text-center col-span-full font-mono">Tidak ada data guru.</p>
            @endforelse
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