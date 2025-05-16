<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKL - Praktik Kerja Lapangan</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white flex flex-col min-h-screen">
    <!-- Header -->
    <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <h1 class="text-2xl font-semibold">PKL Portal</h1>
        </div>
        <nav class="flex items-center gap-4">
            <a href="{{ route('login') }}"
               class="inline-block px-5 py-1.5 dark:text-white text-gray-900 border border-transparent hover:border-gray-300 dark:hover:border-gray-600 rounded-sm text-sm leading-normal">
                Log in
            </a>
            <a href="{{ route('login') }}"
               class="inline-block px-5 py-1.5 dark:text-white border border-gray-300 hover:border-gray-400 dark:border-gray-600 dark:hover:border-gray-500 rounded-sm text-sm leading-normal">
                Register
            </a>
        </nav>
    </header>

    <!-- Banner -->
    <section class="w-full bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-4xl font-bold mb-4">Selamat Datang di Portal PKL</h2>
                <p class="text-lg mb-6">Temukan pengalaman praktik kerja lapangan yang memperkaya pengetahuan dan keterampilan Anda. Bergabunglah sekarang untuk memulai perjalanan profesional Anda!</p>
                <a href="{{ route('login') }}"
                   class="inline-block px-6 py-2 bg-white text-blue-600 font-semibold rounded-md hover:bg-gray-100">
                    Mulai Sekarang
                </a>
            </div>
            <div class="lg:w-1/2">
                <img src="https://via.placeholder.com/600x400?text=PKL+Banner" alt="PKL Banner" class="w-full rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Information Section -->
    <section class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-semibold text-center mb-8">Tujuan PKL</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-medium mb-2">Pengalaman Nyata</h3>
                <p class="text-gray-600 dark:text-gray-300">Dapatkan pengalaman kerja langsung di industri ternama untuk membangun portofolio Anda.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-medium mb-2">Jaringan Profesional</h3>
                <p class="text-gray-600 dark:text-gray-300">Terhubung dengan profesional di bidang Anda dan bangun jaringan untuk masa depan.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-medium mb-2">Pembelajaran Praktis</h3>
                <p class="text-gray-600 dark:text-gray-300">Pelajari keterampilan praktis yang relevan dengan kebutuhan industri saat ini.</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="w-full bg-blue-100 dark:bg-gray-800 text-center py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-semibold mb-4">Siap Memulai PKL Anda?</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">Daftar sekarang dan temukan peluang PKL yang sesuai dengan minat dan bakat Anda.</p>
            <a href="{{ route('login') }}"
               class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-gray-200 dark:bg-gray-800 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600 dark:text-gray-300">
            <p>&copy; 2025 PKL Portal. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
