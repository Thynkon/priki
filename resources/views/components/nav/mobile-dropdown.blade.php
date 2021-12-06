@push('scripts')
    <script src="{{ asset('js/navMobileDropdown.js') }}"></script>
@endpush

<button id="btn-nav-mobile-dropdown"
    class="flex items-center py-1 border-purple-500 uppercase text-base 
        {{ $isActive ? 'font-bold text-gray-900' : 'font-normal text-gray-700 hover:border-l-4 hover:-ml-2 hover:pl-1' }}">
    {{ $name }}
    <svg xmlns="http://www.w3.org/2000/svg" id="ico-nav-mobile-dropup" class="h-5 w-5" viewBox="0 0 20 20"
        fill="currentColor">
        <path fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd" />
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" id="ico-nav-mobile-dropdown" class="hidden h-5 w-5" viewBox="0 0 20 20"
        fill="currentColor">
        <path fill-rule="evenodd"
            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
            clip-rule="evenodd" />
    </svg>
</button>

<div id="nav-mobile-dropdown" class="hidden mx-1 px-4 py-2">
    <div class="grid grid-cols-1 md:grid-cols-2 border-l-4 border-purple-500">
        {{ $slot }}
    </div>
</div>
