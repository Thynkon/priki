<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ __('navigation-menu.homepage') }}
    </h2>

    <div class="py-12">
        @if(Session::has('message'))
              <x-alert/>
        @endif
        @livewire('show-practices')
    </div>
</x-app-layout>