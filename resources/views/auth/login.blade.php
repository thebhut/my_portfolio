<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-slate-300">Email Address</label>
            <input id="email" class="block mt-1 w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="mohit@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
             <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
            <input id="password" class="block mt-1 w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" type="password" name="password" required autocomplete="current-password" placeholder="........." />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-600 bg-slate-900 text-cyan-500 shadow-sm focus:ring-cyan-500" name="remember">
                <span class="ms-2 text-sm text-slate-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="w-full justify-center inline-flex items-center px-4 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:from-cyan-600 hover:to-blue-700 active:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Sign In') }}
            </button>
        </div>
    </form>
</x-guest-layout>
