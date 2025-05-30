    <section class="w-full">
        @include('partials.settings-heading')

        <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
            <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
                <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                <!-- Tambahkan Foto Profil di sini -->
                <!-- Tambahkan Foto Profil di sini -->
                <div class="space-y-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Foto Profil') }}
                    </label>

                    <input
                        type="file"
                        id="image"
                        wire:model="image"
                        class="block w-fit text-xs text-gray-900 bg-white border border-gray-300 rounded-md cursor-pointer
                            dark:text-gray-200 dark:bg-zinc-800 dark:border-zinc-600
                            py-1 px-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                    />

                    @error('image')
                        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror

                    @if (auth()->user()->image)
                        <img
                            src="{{ asset('storage/' . auth()->user()->image) }}"
                            alt="Foto Profil"
                            class="mt-2 h-14 w-14 rounded-md object-cover border dark:border-zinc-600"
                        />
                    @endif
                </div>


                <!-- Tombol Simpan -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full">
                            {{ __('Save') }}
                        </flux:button>
                    </div>

                    <x-action-message class="me-3" on="profile-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>

            <livewire:settings.delete-user-form />
        </x-settings.layout>
    </section>
