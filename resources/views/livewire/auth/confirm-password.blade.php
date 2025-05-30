<div class="bg-void-DEFAULT text-gray-200 min-h-screen flex items-center justify-center px-4 py-10">
    <div class="terminal-box max-w-md w-full p-8 rounded-xl bg-void-light bg-opacity-30 border border-gray-600 shadow-lg">
        <h2 class="text-2xl font-bold mb-2 text-center text-cosmic-light">
            Confirm Password
        </h2>
        <p class="text-sm text-gray-400 text-center mb-6">
            This is a secure area of the application. Please confirm your password before continuing.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center text-sm text-green-500" :status="session('status')" />

        <form wire:submit="confirmPassword" class="flex flex-col gap-5">
            <!-- Password Input -->
            <div>
                <label class="block text-sm mb-1 font-mono text-gray-300" for="password">
                    Password
                </label>
                <flux:input
                    wire:model="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                    viewable
                    class="w-full px-4 py-3 rounded-lg bg-void-light bg-opacity-50 border border-gray-500 text-gray-200"
                />
            </div>

            <flux:button
                variant="primary"
                type="submit"
                class="w-full bg-gradient-to-r from-cosmic-DEFAULT to-nebula text-void-DEFAULT rounded-lg font-bold py-3 hover:opacity-90 transition-all duration-300"
            >
                Confirm
            </flux:button>
        </form>
    </div>
</div>
