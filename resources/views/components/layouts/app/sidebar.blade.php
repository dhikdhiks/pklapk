<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

<div class="px-4 py-3">
  <div class="flex items-center gap-2 mb-2">
    <img src="https://i.ibb.co/dsrhBFpQ/stembayo-1.png" alt="Logo Stembayo" class="w-10 h-10 object-contain" />
    <span class="text-lg font-semibold text-zinc-800 dark:text-white">PKL Stembayo</span>
  </div>

  <flux:radio.group x-data variant="segmented" x-model="$flux.appearance" class="flex justify-start space-x-2">
    <flux:radio value="light" icon="sun" />
    <flux:radio value="dark" icon="moon" />
    <flux:radio value="system" icon="computer-desktop" />
  </flux:radio.group>
</div>



        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    {{ __('Home') }}
                </flux:navlist.item>
                <flux:navlist.item icon="clipboard-document-list" :href="route('pkl')" :current="request()->routeIs('pkl')" wire:navigate>
                    {{ __('Buat Laporan PKL') }}
                </flux:navlist.item>
                <flux:navlist.item icon="academic-cap" :href="route('guru')" :current="request()->routeIs('guru')" wire:navigate>
                    {{ __('Guru') }}
                </flux:navlist.item>
                <flux:navlist.item icon="user" :href="route('siswa')" :current="request()->routeIs('siswa')" wire:navigate>
                    {{ __('Siswa') }}
                </flux:navlist.item>
                <flux:navlist.item icon="building-office-2" :href="route('industri')" :current="request()->routeIs('industri')" wire:navigate>
                    {{ __('Industri') }}
                </flux:navlist.item>
            </flux:navlist.group>
             <flux:navlist.group :heading="__('Setting & Account')" class="grid">
                <flux:navlist.item icon="cog-6-tooth" :href="route('settings.profile')" :current="request()->routeIs('industri')" wire:navigate>
                    {{ __('Settings') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        {{-- Uncomment jika ingin menampilkan nav tambahan
        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>
            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>
        --}}

        <!-- Desktop User Menu -->
        @php
            $foto = auth()->user()?->siswa?->foto;
            $avatarUrl = $foto ? asset('storage/' . $foto) : null;
        @endphp
<flux:dropdown position="bottom" align="start">
    <button type="button" class="flex items-center gap-2 focus:outline-none" aria-haspopup="true" aria-expanded="false">
        <span class="relative block h-10 w-10 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700">
            @if(auth()->user()->image)
                <img
                    src="{{ Storage::url(auth()->user()->image) }}"
                    alt="{{ auth()->user()->name }}"
                    class="h-full w-full object-cover"
                    loading="lazy"
                />
            @else
                <span
                    class="flex h-full w-full items-center justify-center text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ auth()->user()->initials() }}
                </span>
            @endif
        </span>

        <span class="font-semibold text-zinc-800 dark:text-white">{{ auth()->user()->name }}</span>
        <svg class="h-4 w-4 text-zinc-600 dark:text-zinc-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>


            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                                @if(auth()->user()->image)
                                    <img
                                        src="{{ Storage::url(auth()->user()->image) }}"
                                        alt="{{ auth()->user()->name }}"
                                        class="h-full w-full object-cover"
                                        loading="lazy"
                                    />
                                @else
                                    <span
                                        class="flex h-full w-full items-center justify-center text-lg font-semibold text-gray-700 dark:text-gray-200"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                @endif
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                {{-- <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group> --}}

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile
                :name="auth()->user()->name"
                icon-trailing="chevron-down"
                :avatar="auth()->user()->image ? Storage::url(auth()->user()->image) : null"
                :initials="auth()->user()->initials()"
            />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                                @if(auth()->user()->image)
                                    <img
                                        src="{{ Storage::url(auth()->user()->image) }}"
                                        alt="{{ auth()->user()->name }}"
                                        class="h-full w-full object-cover"
                                        loading="lazy"
                                    />
                                @else
                                    <span
                                        class="flex h-full w-full items-center justify-center text-lg font-semibold text-gray-700 dark:text-gray-200"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                @endif
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>
</html>
