<x-app-layout>
    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @include('flash-message')
                    <div class="flex flex-col md:flex-row flex-wrap p-10">
                        <div class="flex mb-4 w-full">
                            <div class="font-semibold text-lg mb-4 mr-4">
                                {{ $practice->title }}
                            </div>
                            <div class="text-gray-400 text-lg mb-4">
                                Domaine - {{ $practice->domain->name }}
                            </div>
                            @if (Auth::user()->isModerator() || Auth::user()->owns($practice))
                                <div class="ml-2">
                                    <a href="{{ route('practice.edit', ['id' => $practice->id]) }}" title="{{ __('Modifier le titre') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
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
                        @if ($practice->changelogs->count() > 0)
                            <div class="p-10 w-full">
                                <p class="font-bold mb-4">{{ __('Historique des modifications') }}</p>
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                          <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                              <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Personne
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Modifiée le
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Raison
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Ancien titre
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($practice->changelogs as $changelog)
                                                  <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                      {{ $changelog->fullname }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                      {{ $changelog->changelogs->updated_at->translatedFormat('jS F Y') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                      {{ $changelog->changelogs->reason }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                      {{ $changelog->changelogs->previously }}
                                                    </td>
                                                  </tr>
                                                @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/dropdown.js"></script>
</x-app-layout>