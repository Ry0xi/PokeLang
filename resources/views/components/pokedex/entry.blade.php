@props(['title'])

<div class="mb-4">
    <h3 class="font-semibold text-xl mb-1">{{ $title }}</h3>
    <div>
        {{ $slot }}
    </div>
</div>