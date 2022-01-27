<div class="max-w-xs mx-auto bg-white rounded-xl p-5 shadow-2xl m-2">
    <a href="{{route('practice.show', $practice->id)}}">
        <p class="font-bold"> {{ $practice->title }}</p>
        @if (Route::is('domains') or Route::is('homepage'))
            <p class="text-gray-400">Domaine - {{ $practice->domain->name }}</p>
        @endif

        <p class="text-justify">{{ Str::limit($practice->description, 170, $end='...') }}</p>
        <div class='mt-5 flex items-center'>
            <div>
                <p class="text-gray-500">{{ $practice->updated_at->translatedFormat('jS F Y')}}</p>
            </div>
        </div>
    </a>
</div>