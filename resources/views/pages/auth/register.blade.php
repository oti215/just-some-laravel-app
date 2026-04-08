<x-auth :title="'Register - ' . config('app.name')" subtitle="Create a new account.">
    @if (session('status'))
        <x-alert :text="session('status')" color="green" light class="mb-4" />
    @endif

    <x-errors class="mb-4" />

    <x-card>
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <x-input
                id="name"
                name="name"
                type="text"
                label="Name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input
                id="email"
                name="email"
                type="email"
                label="Email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-password
                id="password"
                name="password"
                label="Password"
                required
                autocomplete="new-password"
            />

            <x-password
                id="password_confirmation"
                name="password_confirmation"
                label="Confirm password"
                required
                autocomplete="new-password"
            />

            <x-button text="Create account" submit block />
        </form>
    </x-card>

    <p class="mt-5 text-center text-sm text-slate-600">
        Already have an account?
        <x-link href="{{ route('login') }}" sm bold wire:navigate>
            Log in
        </x-link>
    </p>
</x-auth>
