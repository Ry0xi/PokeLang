@props(['type', 'translatedLanguage' => null])
{{-- type: Type Object --}}

@php
    $type_color = strtolower($type->getTranslated('name', 'en'));
@endphp
<span class="inline-block rounded-xl py-1 px-2 border border-t-{{ $type_color }} bg-t-{{ $type_color }} font-semibold text-sm"><span class="text-t-{{ $type_color }}" style="filter: invert(100%) grayscale(100%) contrast(100);">{{ $translatedLanguage ? $type->getTranslated('name', $translatedLanguage) : $type->name }}</span></span>