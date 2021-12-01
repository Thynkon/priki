<div class="relative inline-block w-full text-gray-700">
    <select
        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
        placeholder="Regular input" wire:model='selected_domain_id'>
        @foreach ($domains as $d)
            <option value="{{ $d->id }}">{{ $d->name }}</option>
        @endforeach
    </select>

    <div>
        <div class="flex flex-col md:flex-row flex-wrap">
            @forelse($practices as $practice)
            <div class="max-w-xs mx-auto bg-white rounded-xl p-5 shadow-2xl m-2">
                <a href="{{route('practice.show', $practice->id)}}">
                    <p class="font-bold"> {{ $practice->domain->name }}</p>
                    <p class="text-justify">{{ Str::limit($practice->description, 170, $end='...') }}</p>
                    <div class='mt-5 flex items-center'>
                        <div class="ml-3">
                            <p class="text-gray-500">{{ $practice->updated_at->translatedFormat('jS F Y')}}</p>
                        </div>
                    </div>
                </a>
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
