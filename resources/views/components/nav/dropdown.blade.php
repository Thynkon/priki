<div class="flex group">
    <a href="{{ $route }}"
        class="flex items-center px-2 py-1 group-hover:border-b-4 group-hover:mt-1 border-purple-500 uppercase text-base 
        {{ $isActive ? 'font-bold text-gray-900' : 'font-normal text-gray-700' }}">
        {{ $name }}
        <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:hidden h-5 w-5" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="hidden group-hover:block h-5 w-5" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>

    <div
        class="hidden group-hover:block z-40 absolute top-20 left-0 w-full bg-white shadow-inner drop-shadow-md animate-drop-down">
        <div class="max-w-7xl mx-auto px-8 sm:px-4 lg:px-8 my-8">
            @isset($title)
                <h3 class="pb-8 font-bold text-3xl text-purple-500">{{ $title }}</h3>
            @endisset
            <div class="grid grid-rows-3 grid-flow-col gap-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
