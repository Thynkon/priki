<x-app-layout>
    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col p-10">
                        <div class="flex justify-end">
                            <div class="w-28 text-right">
                                <a href="{{ route('references.create') }}" class="inline-block text-center w-full py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">{{ __('Ajouter une référence') }}</a>
                            </div>
                        </div>
                        @foreach ($references as $reference)
                            <x-reference-component :reference="$reference"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>