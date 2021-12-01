<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigation-menu.homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col md:flex-row flex-wrap p-10">
                        <div class="font-semibold text-lg mb-4">
                            {{ $practice->domain->name }}
                        </div>
                        <div class="text-justify">
                            {{ $practice->description }}
                        </div>
                        <div class="flex justify-end w-full">
                            <div class="text-gray-500 mt-4">{{ $practice->updated_at->translatedFormat('jS F Y')}}</div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap px-10">
                        <div class="w-full">
                            @livewire('opinion-form', ["practice_id" => $practice->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
