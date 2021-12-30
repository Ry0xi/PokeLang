<x-layout>
    <div class="flex justify-center items-center min-w-full min-h-full">
        <x-card class="flex-1 max-w-xl mx-auto my-auto">
            <x-card-title class="mb-4">Settings</x-card-title>

            <form method="POST" action="/settings">
                @csrf
                
                <div class="mb-2 flex justify-center">
                    <label class="text-lg mb-2">Your First Languages: </label>
                    <select name="first_language" id="first_language">
                        @foreach ($app_support_languages as $lang)
                            <option value="{{ $lang }}" {{ $first_language == $lang ? 'selected' : ''}}>{{ $lang }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-2 flex justify-center">
                    <label class="text-lg mb-2">Language You Want to Study: </label>
                    <select name="study_language" id="study_language">
                        @foreach ($app_support_languages as $lang)
                            <option value="{{ $lang }}" {{ $study_language == $lang ? 'selected' : ''}}>{{ $lang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-center">
                    <x-form.button>Save</x-form.button>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>