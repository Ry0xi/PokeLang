@props(['pokemon'])

<div class="p-1 rounded-lg w-full shadow-md bg-split-gradient-to-br from-t-{{$pokemon->type1}} to-t-{{ $pokemon->type2 ? $pokemon->type2 : $pokemon->type1 }}">

    <div class="rounded bg-white bg-opacity-50 p-2">
        <div class="flex justify-start mb-1">
            <div class="flex items-center justify-center w-12 bg-white border border-gray-300 rounded-xl mr-2">
                <span class="text-sm font-semibold">{{ sprintf('#%03d', $pokemon->id) }}</span>
            </div>

            <div class="flex flex-1">
                <h3 class="text-2xl font-semibold text-gray-800">{{ ucwords($pokemon->ame) }}</h3>
            </div>

        </div>

        <div>
            <img src="{{ $pokemon->sprite }}" alt="" class="w-full">
        </div>
        
    </div>

</div>