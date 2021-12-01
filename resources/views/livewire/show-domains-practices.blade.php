<div class="relative inline-block w-full text-gray-700">
    <select
        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
        placeholder="Regular input" wire:model='selected_domain_id'>
            <option value="0" selected="selected">{{ "All ($numberOfPractices)" }}</option>
        @foreach ($domains as $d)
            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->practices()->count() }})</option>
        @endforeach
    </select>

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
    {{ $practices->links() }}
</div>
