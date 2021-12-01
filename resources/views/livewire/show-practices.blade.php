<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <span>Afficher les practices des </span>
        <input
            class="w-20 h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"
            type="number" name="days_filter" value="{{$limit}}" wire:model.laz="limit" wire:change="update()"/>
        <span>derniers jours</span>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
        {{ $practices->links() }}
    </div>
</div>
