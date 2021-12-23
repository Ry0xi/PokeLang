<x-layout>
    <div class="flex justify-center items-center min-w-full min-h-full">
        <x-card class="flex-1 max-w-xl mx-auto my-auto">
            <x-card-title>Register</x-card-title>
            <form method="POST" action="/register">
                @csrf
                
                <x-form.input name="name" required autocomplete="nickname" />
                <x-form.input name="email" type="email" required autocomplete="email" />
                <x-form.input name="password" type="password" required autocomplete="new-password" />

                <x-form.button>Submit</x-form.button>
            </form>
        </x-card>
    </div>
</x-layout>