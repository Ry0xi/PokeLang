<x-layout>
    <div class="flex justify-center items-center min-w-full min-h-full">
        <x-card class="flex-1 max-w-xl mx-auto my-auto">
            <x-card-title>Login</x-card-title>
            <form method="POST" action="/login">
                @csrf
                
                <x-form.input name="email" type="email" required autocomplete="email" />
                <x-form.input name="password" type="password" required autocomplete="current-password" />

                <x-form.button>Log In</x-form.button>
            </form>
        </x-card>
    </div>
</x-layout>