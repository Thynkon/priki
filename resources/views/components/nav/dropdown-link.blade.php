@if ($isActive)
    <a href="{{ $route }}"
        {{ $attributes->merge(['class' => 'py-1 font-bold text-gray-900']) }}>
        {{ $name }}
    </a>
@else
    <span class="flex items-center">
        <a href="{{ $route }}"
            {{ $attributes->merge(['class' => 'py-1 text-gray-700 hover:border-b-4 hover:-mb-1 border-purple-500']) }}>
            {{ $name }}
        </a>
    </span>
@endif
