<x-app-layout>
    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @include('flash-message')
                    <div class="flex flex-col p-10">
                        <form method="post" action="{{ route('practice.update', ['id' => $practice->id]) }} ">
                            <div class="col-span-6 sm:col-span-4 mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-2" for="practice">
                                    {{ __('Titre') }}
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="title" name="title" type="text" value="{{ $practice->title }}" required></input>
                            </div>

                            <div class="col-span-6 sm:col-span-4 mb-4">
                                <label class="block font-medium text-sm text-gray-700 mb-2" for="practice">
                                    {{ __('Raison') }}
                                </label>
                                <textarea
                                    class="h-24  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="reason" name="reason" type="text" value="{{ old('reason') }}">
                                </textarea>
                            </div>

                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            @method('PUT')

                            <div class="flex items-center justify-end py-3 text-right sm:rounded-bl-md sm:rounded-br-md">
                                <button type="submit"
                                    class="text-center w-28 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>