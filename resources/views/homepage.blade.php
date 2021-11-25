<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Page d'accueil") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span>Afficher les practices des </span>
            <input class="w-20 h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" name="days_filter" placeholder="Nombre de jours" value="1"/>
            <span>derniers jours</span>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col md:flex-row">
                    @forelse($practices as $practice)
                        <div class="max-w-xs mx-auto bg-white rounded-xl p-5 shadow-2xl m-2">
                            <p class="font-bold"> {{ $practice->domain->name }}</p>
                            <p>{{ $practice->description }}</p>
                            <div class='mt-5 flex items-center'>
                                <div class="ml-3">
                                        <p class="text-gray-500">{{ $practice->updated_at->translatedFormat('l jS F Y')}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <p>Aucune practice à afficher ici</p>
                        </div>
                    @endforelse
                </div>
            </div>
            {{ $practices->links() }}
        </div>
    </div>
</x-app-layout>
