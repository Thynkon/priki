<div class="w-full">
    <div>
        @php
            $nbr_feedbacks = $opinion->feedbacks->count();
        @endphp

        @if ($nbr_feedbacks <= 0)
            Aucun commentaire
        @elseif ($nbr_feedbacks === 1)
            {{ $nbr_feedbacks }} commentaire
        @else
            {{ $nbr_feedbacks }} commentaires
        @endif
    </div>

    <div class="flex justify-between bg-gray-50 shadow p-4 my-4 rounded dropdown-button">
        <div class="flex flex-col justify-center">
            <div class="flex mb-2">
                @if(!Auth::user()->wrote($opinion))
                    <a href="{{ route('opinion.upvote', ['id' => $opinion->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                        </svg>
                    </a>
                @else
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                        </svg>
                    </div>
                @endif
                <span class="pl-2">{{ $opinion->upvotes->count() }}</span>
            </div>
            <div class="flex mt-2">
                @if(!Auth::user()->wrote($opinion))
                    <a href="{{ route('opinion.downvote', ['id' => $opinion->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
                        </svg>
                    </a>
                @else
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
                        </svg>
                    </div>
                @endif
                <span class="pl-2">{{ $opinion->downvotes->count() }}</span>
            </div>
        </div>
        <div class="w-full ml-20">
            <div class="text-justify px-2">{{$opinion->description}}</div>
            <div class="my-4 bg-cyan-50">
                @foreach ($opinion->references as $reference)
                    <div class="p-2">
                        @if(isset($reference->url))
                            <a href="{{ $reference->url }}" target="_blank" rel="noopener noreferrer">{{ $reference->description }}</a>
                        @else
                            <div>{{$reference->description}}</div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="text-right">
                <div class="bg-green-200 p-1 rounded text-right inline-block">
                    <a href="{{ route('user.show', ['user' => $opinion->user->id]) }}">{{$opinion->user->fullname}}</a>
                </div>
            </div>
        </div>

        @if (Auth::check() && Auth::user()->wrote($opinion))
            <div class="ml-auto self-center ml-4">
                <a href="{{ route('opinion.delete', ['id' => $opinion->id]) }}" title="{{ __('Delete') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </a>
            </div>
        @endif
    </div>

    <div class="feedback-wrapper hidden">
        @foreach ($opinion->feedbacks as $feedback)
            <x-opinion-feedback :user="$feedback" />
        @endforeach

        <form method="POST" action="{{ route('opinion.comment', ['id' => $opinion->id]) }}">
            @csrf
            <textarea name="comment" class="h-24 lg:h-44 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full mb-4"></textarea>
            <div class="flex justify-end">
                <x-button>{{ __('Commenter') }}</x-button>
            </div>
        </form>
    </div>
</div>