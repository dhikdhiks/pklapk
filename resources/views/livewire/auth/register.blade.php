<!-- resources/views/livewire/auth/register.blade.php -->
<div class="bg-void-DEFAULT font-grotesk text-gray-200 overflow-x-hidden min-h-screen relative">
    <!-- Background pattern -->
    <div class="fixed inset-0 -z-10 grid-pattern">
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
                        <img href="https://imgbb.com/" src="https://i.ibb.co/dsrhBFpQ/stembayo-1.png" alt="stembayo-1" class="w-14 h-14 object-contain">
                    </span>
                </div>
                <span class="text-xl font-bold tracking-tighter">PKL Reeport Stembayo</span>
            </div>
            <a href="{{ route('login') }}"
               class="px-5 py-2 rounded-md border border-cosmic-DEFAULT text-cosmic-DEFAULT hover:bg-cosmic-DEFAULT hover:bg-opacity-10 transition-colors duration-300 font-medium">
                Login
            </a>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="container mx-auto px-6 py-20 md:py-32">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-16 lg:mb-0">
                <div class="mb-8 inline-block terminal-box px-4 py-2 rounded-md">
                    <span class="text-cosmic-DEFAULT font-mono">SMKN 2</span>
                    <span class="text-gray-400 font-mono ml-3">// Depok Sleman</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-8">
                    <span class="text-cosmic-light cyber-glow">Buat Akun</span><br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cosmic-light to-nebula">PKL Stembayo</span>
                </h1>
                <p class="text-lg text-gray-300 mb-10 max-w-lg">
                    Daftar sekarang untuk mulai mengelola dan mengisi laporan PKL Anda dengan sistem modern dan efisien.
                </p>
            </div>

            <div class="lg:w-1/2 lg:pl-16 relative">
                <div class="relative animation-float">
                    <div class="terminal-box rounded-2xl overflow-hidden">
                        <div class="p-4 border-b border-gray-800 flex space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="p-6">
                            <form wire:submit.prevent="register" class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-mono text-gray-300 mb-2">Nama Lengkap</label>
                                    <input type="text" id="name" wire:model.defer="name" required
                                           class="w-full px-4 py-3 bg-void-light bg-opacity-30 border border-gray-600 rounded-lg text-gray-200 focus:outline-none focus:border-cosmic-DEFAULT transition-colors duration-300">
                                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-mono text-gray-300 mb-2">Email</label>
                                    <input type="email" id="email" wire:model.defer="email" required
                                           class="w-full px-4 py-3 bg-void-light bg-opacity-30 border border-gray-600 rounded-lg text-gray-200 focus:outline-none focus:border-cosmic-DEFAULT transition-colors duration-300">
                                    @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-mono text-gray-300 mb-2">Password</label>
                                    <input type="password" id="password" wire:model.defer="password" required
                                           class="w-full px-4 py-3 bg-void-light bg-opacity-30 border border-gray-600 rounded-lg text-gray-200 focus:outline-none focus:border-cosmic-DEFAULT transition-colors duration-300">
                                    @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-mono text-gray-300 mb-2">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" wire:model.defer="password_confirmation" required
                                           class="w-full px-4 py-3 bg-void-light bg-opacity-30 border border-gray-600 rounded-lg text-gray-200 focus:outline-none focus:border-cosmic-DEFAULT transition-colors duration-300">
                                </div>
                                <button type="submit"
                                        class="w-full px-8 py-4 bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-lg text-void-DEFAULT font-bold hover:opacity-90 transition-all duration-300">
                                    Register
                                </button>
                            </form>
                            <div class="mt-4 text-center">
                                <a href="{{ route('login') }}"
                                   class="text-sm text-cosmic-DEFAULT hover:text-cosmic-light transition-colors duration-300">
                                    Sudah punya akun? Login di sini
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -z-10 -inset-4 bg-gradient-to-r from-cosmic-DEFAULT to-nebula rounded-2xl opacity-20 blur-xl"></div>
                </div>
            </div>
        </div>
    </section>
</div>
