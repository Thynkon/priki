<x-app-layout>
    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col p-10">
                        @forelse ($domains as $domain)
                            <p class="font-bold"> {{ $domain->name }}</p>
                            @foreach ($domain->practices as $practice)
                                <div class="my-2">
                                    <a href="{{ route('practice.show', ['id' => $practice->id]) }}">
                                        <p class="text-justify">{{ Str::limit($practice->description, 170, $end='...') }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @empty
                            <div>{{ __('Rien à afficher') }}</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>