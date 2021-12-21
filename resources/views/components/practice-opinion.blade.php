<div id="comments-wrapper" class="w-full">
    <div>{{$opinion->userFeedbacks->count()}} Commentaires</div>
    <div class="flex justify-between bg-gray-50 shadow p-4 my-4 rounded">
        <div>
            <div>Upvotes - {{ $opinion->upvotes->count() }}</div>
            <div>Downvotes - {{ $opinion->downvotes->count() }}</div>
        </div>
        <div>
            <div>{{$opinion->description}}</div>
            <div class="bg-green-200 p-1 rounded">
                <a href="{{ route('user.show', ['user' => $opinion->user->id]) }}">{{$opinion->user->fullname}}</a>
            </div>
        </div>
    </div>

    <div id="feedback-wrapper" class="hidden">
        @foreach ($opinion->userFeedbacks as $userFeedback)
            <x-opinion-feedback :user="$userFeedback" />
        @endforeach
    </div>
</div>