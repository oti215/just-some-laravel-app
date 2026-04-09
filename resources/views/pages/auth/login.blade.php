<x-auth :title="'Log in - ' . config('app.name')">
    @if (session('status'))
        <x-alert :text="session('status')" color="green" light class="mb-4" />
    @endif

    <x-errors class="mb-4" />

    <x-card>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <x-input
                id="email"
                name="email"
                type="email"
                label="Email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-password
                id="password"
                name="password"
                label="Password"
                required
                autocomplete="current-password"
            />

            <div class="flex items-center justify-between">
                <x-checkbox
                    id="remember"
                    name="remember"
                    label="Remember me"
                    :checked="old('remember')"
                />

                @if (Route::has('password.request'))
                    <x-link href="{{ route('password.request') }}" sm>
                        Forgot password?
                    </x-link>
                @endif
            </div>

            <x-button text="Log in" submit block />
        </form>
    </x-card>

    @if (Route::has('register'))
        <p class="mt-5 text-center text-sm text-slate-600">
            Need an account?
            <x-primary-link href="{{ route('register') }}" title="Register" />
        </p>
    @endif
</x-auth>
