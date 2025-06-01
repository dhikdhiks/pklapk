<div class="min-h-screen bg-void-DEFAULT">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-cosmic-light cyber-glow mb-6 font-grotesk">Daftar Industri</h1>
        
<div class="terminal-box rounded-xl scrollbar-thin scrollbar-thumb-cosmic-DEFAULT scrollbar-track-transparent">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] divide-y divide-cosmic-DEFAULT divide-opacity-30">
                <thead class="bg-gradient-to-r from-cosmic-DEFAULT to-nebula text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider font-grotesk">Nama Industri</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider font-grotesk">Alamat</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider font-grotesk">Kontak</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider font-grotesk">Bidang</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider font-grotesk">Jumlah PKL</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cosmic-DEFAULT divide-opacity-30">
                    @forelse ($industris as $index => $industri)
                        <tr class="{{ $index % 2 === 0 ? 'bg-void-light bg-opacity-10' : 'bg-void-DEFAULT bg-opacity-10' }} hover:bg-cosmic-DEFAULT hover:bg-opacity-10 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-white font-mono">{{ $industri->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-white font-mono">{{ $industri->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-white font-mono">{{ $industri->kontak }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-white font-mono">{{ $industri->bidang_usaha }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-white font-mono">{{ $industri->pkls->count() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-400 font-mono">Tidak ada data industri.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
