@if ($isActive)
    <a href="{{ $route }}"
        {{ $attributes->merge(['class' => 'flex items-center py-1 font-bold uppercase text-base text-gray-900']) }}>
        {{ $name }}
    </a>
@else
    <a href="{{ $route }}"
        {{ $attributes->merge(['class' => 'flex items-center py-1 uppercase text-base text-gray-700 hover:border-b-4 hover:mt-1 border-purple-500']) }}>
        {{ $name }}
    </a>
@endif
