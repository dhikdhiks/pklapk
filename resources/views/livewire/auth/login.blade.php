<div class="min-h-screen">
    <div class="flex min-h-screen items-center justify-center bg-base-200">
        <div class="w-full max-w-md p-6">
            <div class="mb-6 flex items-center justify-center">
                <x-app-logo />
            </div>
            <h1 class="mb-4 text-center text-2xl font-bold">Login</h1>
            <form wire:submit.prevent="login" class="space-y-4">
                <x-input
                    type="email"
                    name="email"
                    label="Email"
                    placeholder="Enter your email"
                    wire:model.defer="email"
                />
                <x-input
                    type="password"
                    name="password"
                    label="Password"
                    placeholder="Enter your password"
                    wire:model.defer="password"
                />
                <x-button type="submit" class="w-full">Login</x-button>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-sm text-primary">Don't have an account? Register</a>
            </div>
</div>
