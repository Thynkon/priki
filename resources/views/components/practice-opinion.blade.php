<div class="w-full">
    <div>{{$opinion->feedbacks->count()}} Commentaires</div>

    <div class="flex justify-between bg-gray-50 shadow p-4 my-4 rounded dropdown-button">
        <div class="flex flex-col justify-center">
            <div class="flex mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                </svg>
                <span class="pl-2">{{ $opinion->upvotes->count() }}</span>
            </div>
            <div class="flex mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
                </svg>
                <span class="pl-2">{{ $opinion->downvotes->count() }}</span>
            </div>
        </div>
        <div class="w-full ml-20 mr-4">
            <div class="text-justify">{{$opinion->description}}</div>
            <div class="text-right">
                <div class="bg-green-200 p-1 rounded text-right inline-block">
                    <a href="{{ route('user.show', ['user' => $opinion->user->id]) }}">{{$opinion->user->fullname}}</a>
                </div>
            </div>
        </div>

        @if (Auth::check() && Auth::user()->wroteOpinion($opinion))
        <div class="ml-auto self-center">
            <a href="{{ route('opinion.delete', ['id' => $opinion->id]) }}" title="{{ __('Delete') }}"><svg
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg></a>
        </div>
        @endif
    </div>

    <div class="feedback-wrapper hidden">
        @foreach ($opinion->feedbacks as $feedback)
        <x-opinion-feedback :user="$feedback" />
        @endforeach
    </div>
</div>