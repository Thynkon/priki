<form method="post" action="{{ route('opinion.store', ['practice_id' => $practice->id]) }} ">
    @include('flash-message')

    <div class="col-span-6 sm:col-span-4">
        <label class="block font-medium text-sm text-gray-700" for="practice">
            {{ __('Opinion') }}
        </label>
        <textarea
            class="h-24 lg:h-44 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
            id="opinion" name="opinion" type="text" wire:model="opinion" required></textarea>
    </div>

    <input name="_token" type="hidden" value="{{ csrf_token() }}" />

    <div class="flex items-center justify-end py-3 text-right sm:rounded-bl-md sm:rounded-br-md">
        <div x-data="{ shown: false, timeout: null }"
            x-init="window.livewire.find('GQqbKsWWMcJgJtatHG5z').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
            x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms=""
            style="display: none;" class="text-sm text-gray-600 mr-3">
            Saved.
        </div>

        <button type="submit"
            class="text-center w-28 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            {{ __('Enregistrer') }}
        </button>
    </div>

</form>