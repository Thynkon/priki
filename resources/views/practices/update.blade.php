<x-app-layout>
    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @include('flash-message')
                    <div class="flex flex-col md:flex-row flex-wrap p-10">
                        <div class="font-semibold text-lg mb-4 mr-4">
                            {{ $practice->title }}
                        </div>
                        <div class="text-gray-400 text-lg mb-4">
                            Domaine - {{ $practice->domain->name }}
                        </div>
                        <div class="text-lg mb-4">
                            <a href="{{ route('practice.edit', ['id' => $practice->id]) }}" class="ml-4">Editer le titre</a>
                        </div>
                        <div class="text-justify">
                            {{ $practice->description }}
                        </div>
                        <div class="flex flex-col items-end justify-end w-full">
                            <div class="text-gray-500 mt-4">Auteur(e): {{ $practice->user->fullname }}</div>
                            <div class="text-gray-500 mt-4">Crée le: {{ $practice->created_at->translatedFormat('jS F Y')}}</div>
                            <div class="text-gray-500 mt-4">Mis à jour le: {{ $practice->updated_at->translatedFormat('jS F Y')}}</div>
                        </div>

                        @if ($practice->canBePublished())
                            <div class="flex flex-col items-end justify-end w-full mt-4">
                                <a href="{{ route('practice.publish', ['id' => $practice->id]) }}" class="text-center w-28 p-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    {{ __('Publier') }}
                                </a>
                            </div>
                        @endif
                        
                        @forelse ($practice->opinions as $opinion)
                            <x-practice-opinion :opinion="$opinion"/>
                        @empty
                            <div>Aucune opinion à afficher</div>
                        @endforelse

                    </div>

                    <div class="flex flex-col md:flex-row flex-wrap">
                    @if (Auth::check())
                        @if (Auth::user()->commentsOfPractice($practice)->count() === 0)
                            <div class="flex flex-col md:flex-row flex-wrap px-10 w-full">
                                <div class="w-full">
                                    <x-opinion-form :practice="$practice" :references="$references"/>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="flex pb-4 w-full px-10">
                            <div class="p-4 bg-red-100 w-full text-center rounded">Vous devez vous connecter afin de pouvoir commenter des opinions !</div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/dropdown.js"></script>
</x-app-layout>