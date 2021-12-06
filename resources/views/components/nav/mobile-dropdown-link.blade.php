@if ($isActive)
    <a href="{{ $route }}"
        {{ $attributes->merge(['class' => 'h-full px-2 py-1 flex items-center font-bold text-gray-900']) }}>
        {{ $name }}
    </a>
@else
    <span class="flex items-center">
        <a href="{{ $route }}"
            {{ $attributes->merge(['class' => 'h-full px-2 py-1 flex items-center text-gray-700 hover:text-purple-500']) }}>
            {{ $name }}
        </a>
    </span>
@endif
