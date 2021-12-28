<div class="w-full">
    <div>{{$opinion->feedbacks->count()}} Commentaires</div>

    <div class="flex justify-between bg-gray-50 shadow p-4 my-4 rounded dropdown-button">
        <div>
            <div>Upvotes - {{ $opinion->upvotes->count() }}</div>
            <div>Downvotes - {{ $opinion->downvotes->count() }}</div>
        </div>
        <div>
            <div>{{$opinion->description}}</div>
            <div>
                <div class="bg-green-200 p-1 rounded text-right">
                    <a href="{{ route('user.show', ['user' => $opinion->user->id]) }}">{{$opinion->user->fullname}}</a>
                </div>
            </div>
        </div>

        @if (Auth::user()->wroteOpinion($opinion))
            <div>
                <a href="{{ route('opinion.delete', ['id' => $opinion->id]) }}" title="{{ __('Delete') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
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