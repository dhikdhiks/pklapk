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