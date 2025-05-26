<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
        <!-- Bagian Kiri: Form Login -->
        <div class="flex flex-col justify-center p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="flex flex-col gap-6">
                <!-- Header -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Log in to your account') }}</h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Enter your email and password below to log in') }}</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="text-center text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Session Error -->
                @if (session('error'))
                    <div class="text-center text-red-600 dark:text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form Login -->
                <form wire:submit="login" class="flex flex-col gap-6">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email address') }}</label>
                        <input
                            id="email"
                            type="email"
                            wire:model="email"
                            class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                            placeholder="email@example.com"
                            required
                            autofocus
                            autocomplete="email"
                        />
                        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Password') }}</label>
                        <input
                            id="password"
                            type="password"
                            wire:model="password"
                            class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-grayisp-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:text-white"
                            placeholder="Password"
                            required
                            autocomplete="current-password"
                        />
                        @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                        <!-- Link Lupa Password -->
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               wire:navigate
                               class="absolute end-0 top-0 text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            id="remember"
                            type="checkbox"
                            wire:model="remember"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Tombol Login -->
                    <div class="flex items-center justify-end">
                        <button
                            type="submit"
                            class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>

                <!-- Link Register -->
                @if (Route::has('register'))
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}" wire:navigate class="text-indigo-600 dark:text-indigo-400 hover:underline">
                            {{ __('Sign up') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Bagian Kanan: Gambar -->
        <div class="hidden lg:block">
            <img
                src="{{ asset('/image/background/BackgroundLogin.gif') }}"
                alt="Siswa"
                class="w-full h-full object-cover rounded-lg shadow-lg"
            />
        </div>
    </div>
</div>
