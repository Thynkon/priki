<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigation-menu.homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col md:flex-row flex-wrap p-10">
                        <div class="font-semibold text-lg mb-4">
                            {{ $practice->domain->name }}
                        </div>
                        <div class="text-justify">
                            {{ $practice->description }}
                        </div>
                        <div class="flex justify-end w-full">
                            <div class="text-gray-500 mt-4">{{ $practice->updated_at->translatedFormat('jS F Y')}}</div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap px-10">
                        <div class="w-full">
                            <form>
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="name">
                                        {{ __('Opinion') }}
                                    </label>
                                    <textarea
                                        class="h-24 lg:h-44 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="text"></textarea>
                                </div>

                                <div class="flex items-center justify-end py-3 text-right sm:rounded-bl-md sm:rounded-br-md">
                                    <div x-data="{ shown: false, timeout: null }"
                                         x-init="window.livewire.find('GQqbKsWWMcJgJtatHG5z').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                                         x-show.transition.out.opacity.duration.1500ms="shown"
                                         x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                                         class="text-sm text-gray-600 mr-3">
                                        Saved.
                                    </div>

                                    <button type="submit" class="text-center w-28 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        {{ __('Save') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
