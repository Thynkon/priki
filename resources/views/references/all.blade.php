<x-app-layout>
    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col p-10">
                        @foreach ($references as $reference)
                            <x-reference-component :reference="$reference"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>