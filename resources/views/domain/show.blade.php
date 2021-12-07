<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigation-menu.domains') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="pl-10 pt-10">
                        {{ __('Show practices of domain') }}
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap p-10">
                        <div class="relative inline-block w-full text-gray-700">
                            <div>
                                <div class="flex flex-col md:flex-row flex-wrap">
                                    @forelse($practices as $practice)
                                        <x-practice-card :practice="$practice"/>
                                    @empty
                                    <div>
                                        <p>Aucune practice à afficher ici</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
