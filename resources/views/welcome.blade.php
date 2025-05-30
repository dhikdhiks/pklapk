<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL | Report Aplication</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script>
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
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 8s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
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
        }
    </style>
</head>
<body class="bg-void-DEFAULT font-grotesk text-gray-200 overflow-x-hidden">
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden -z-10 grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-void-dark via-void-DEFAULT to-void-light opacity-90"></div>
        <div class="absolute top-1/4 -left-40 w-96 h-96 bg-cosmic-DEFAULT rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-nebula rounded-full opacity-10 blur-3xl"></div>
    </div>

    <!-- Navigation -->
    <nav class="container mx-auto px-6 py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-cosmic-DEFAULT rounded-lg flex items-center justify-center rotate-45">
                <span class="-rotate-45 inline-block w-14 h-14">
                <img src="https://i.ibb.co/dsrhBFpQ/stembayo-1.png" alt="stembayo-1" class="w-14 h-14 object-contain">
                </span>
                </div>
                <span class="text-xl font-bold tracking-tighter">PKL Reeport Stembayo</span>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                {{-- <a href="#" class="hover:text-cosmic-light transition-colors duration-300">Products</a>
                <a href="#" class="hover:text-cosmic-light transition-colors duration-300">Solutions</a>
                <a href="#" class="hover:text-cosmic-light transition-colors duration-300">Pricing</a>
                <a href="#" class="hover:text-cosmic-light transition-colors duration-300">Developers</a> --}}
            </div>

                <div class="flex items-center space-x-4">
                    <a
                        href="{{ route('login') }}"
                        class="px-5 py-2 rounded-md border border-cosmic-DEFAULT text-cosmic-DEFAULT hover:bg-cosmic-DEFAULT hover:bg-opacity-10 transition-colors duration-300 font-medium"
                    >
                        Login
                    </a>
                                   <a
                        href="{{ route('register') }}"
                        class="px-5 py-2 rounded-md border border-cosmic-DEFAULT text-cosmic-DEFAULT hover:bg-cosmic-DEFAULT hover:bg-opacity-10 transition-colors duration-300 font-medium"
                    >
                        Registrasi
                    </a>
                </div>


            <button class="md:hidden text-cosmic-DEFAULT">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto px-6 py-20 md:py-32">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-16 lg:mb-0">
                <div class="mb-8 inline-block terminal-box px-4 py-2 rounded-md">
                    <span class="text-cosmic-DEFAULT font-mono">SMKN 2</span>
                    <span class="text-gray-400 font-mono ml-3">// Depok Sleman</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-8">
                    <span class="text-cosmic-light cyber-glow">Buat Laporan PKL</span><br>
                    dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-cosmic-light to-nebula">mudah dan cepat</span>
                </h1>

                <p class="text-lg text-gray-300 mb-10 max-w-lg">
                             Buat, kelola, dan lacak laporan Praktik Kerja Lapangan dengan platform kami yang dirancang untuk siswa, guru, dan mitra industri SMKN 2 Depok Sleman.
                </p>

                {{-- <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <button class="px-8 py-4 bg-gradient-to-r from-cosmic-DEFAULT to-cosmic-dark rounded-lg text-void-DEFAULT font-bold hover:opacity-90 transition-all duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                        </svg>
                        Download SDK
                    </button>
                    <button class="px-8 py-4 border border-gray-600 rounded-lg font-medium hover:border-cosmic-DEFAULT hover:text-cosmic-light transition-all duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Watch Demo
                    </button>
                </div> --}}

                {{-- <div class="mt-12 flex items-center space-x-6">
                    <div class="flex -space-x-3">
                        <img class="w-10 h-10 rounded-full border-2 border-void-DEFAULT" src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-void-DEFAULT" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-void-DEFAULT" src="https://randomuser.me/api/portraits/women/68.jpg" alt="User">
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">D</p>
                        <div class="flex items-center space-x-4 mt-1">
                            <span class="font-mono">NASA</span>
                            <span class="font-mono">SpaceX</span>
                            <span class="font-mono">CERN</span>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="lg:w-1/2 lg:pl-16 relative">
                <div class="relative animation-float">
                    <div class="terminal-box rounded-2xl overflow-hidden">
                        <div class="p-4 border-b border-gray-800 flex space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="p-6 font-mono text-sm">
                            <div class="text-cosmic-DEFAULT">$ <span class="text-gray-300 font-bold">Langkah-Langkah membuat laporana</span></div>
                            <div class="text-gray-500 mt-2">> Pastikan Email dan Nama Sudah Terdaftar melalui admin PKL STembayo</div>
                            <div class="text-gray-500">> Registrasi akun dengan email yang sudah didata</div>
                            <div class="text-green-400">✓ Success! Membuat Akun dan bisa Login</div>
                            <div class="text-gray-500 mt-2">> Login Menggunakan Akun yang Sudan di daftarkan</div>
                            <div class="text-gray-500">> Masuk ke Page PKL dan Pencet tombol Buat laporan</div>
                            <div class="text-gray-500 mt-2">> Isi form sesuai Guru pembimbing dan Industri kalian</div>
                            <div class="text-gray-500 mt-2">> Isi Hari mulai PKL - Hari Selesai</div>
                            <div class="text-green-400 mt-4">🚀 Selamat, laporan telah berhasil dibuat!</div>
                        </div>
                    </div>

                    <div class="absolute -z-10 -inset-4 bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-2xl opacity-20 blur-xl"></div>
                </div>

                <div class="absolute -right-20 top-1/4 hidden xl:block">
                    <div class="relative animation-float" style="animation-delay: 1s;">
                        <div class="w-48 h-48 bg-gradient-to-br from-cosmic-DEFAULT to-nebula rounded-2xl opacity-80"></div>
                        {{-- <div class="absolute inset-0 border border-cosmic-light rounded-2xl opacity-30 m-2"></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="container mx-auto px-6 py-20">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cosmic-light to-nebula">Fitur yang Ada</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Dirancang untuk mempermudah pengelolaan laporan PKL bagi seluruh pengguna
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="terminal-box p-8 rounded-xl hover:border-cosmic-DEFAULT transition-all duration-300">
                <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cosmic-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4"> Pembuatan Laporan Cepat </h3>
                <p class="text-gray-400">
                    Buat laporan PKL dengan template siap pakai, hemat waktu dan tenaga.
                </p>
            </div>

            <div class="terminal-box p-8 rounded-xl hover:border-cosmic-DEFAULT transition-all duration-300">
                <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cosmic-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Keamanan Data</h3>
                <p class="text-gray-400">
                    Data laporan Anda dilindungi dengan enkripsi tingkat tinggi untuk privasi maksimal.
                </p>
            </div>

            <div class="terminal-box p-8 rounded-xl hover:border-cosmic-DEFAULT transition-all duration-300">
                <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cosmic-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Pelacakan Real-Time</h3>
                <p class="text-gray-400">
                    Lacak status laporan Anda secara langsung, dari pengajuan hingga verifikasi.
                </p>
            </div>

            <div class="terminal-box p-8 rounded-xl hover:border-cosmic-DEFAULT transition-all duration-300">
                <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cosmic-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4"> Integrasi Industri </h3>
                <p class="text-gray-400">
                    Kolaborasi mudah dengan mitra industri untuk validasi dan umpan balik.
                </p>
            </div>

            <div class="terminal-box p-8 rounded-xl hover:border-cosmic-DEFAULT transition-all duration-300">
                <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cosmic-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Antarmuka Interaktif</h3>
                <p class="text-gray-400">
                    Kolaborasi mudah dengan mitra industri untuk validasi dan umpan balik.
                    Desain modern dan ramah pengguna, cocok untuk semua tingkat pengguna.
                </p>
            </div>

            <div class="terminal-box p-8 rounded-xl hover:border-cosmic-DEFAULT transition-all duration-300">
                <div class="w-12 h-12 bg-cosmic-DEFAULT bg-opacity-20 rounded-lg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cosmic-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Lapor dengan Respon Cepat</h3>
                <p class="text-gray-400">
                    Lapor ke Admin jika ada kesalahan.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container mx-auto px-6 py-32 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">
                Siap untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-cosmic-light to-nebula">membuat</span> laporan PKL sekarang?
            </h2>
            <p class="text-xl text-gray-300 mb-10">
                Register dan Buat Laporan PKL dengan mudah.
            </p>
            <button class="px-10 py-4 bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-lg text-void-DEFAULT font-bold hover:opacity-90 transition-all duration-300">
                Register
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 inline" viewBox="0 0 20 20" fill="currentColor" href="{{ route('register') }}">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </section>
</body>
</html>
