<div>
    @foreach ($opinion->userFeedbacks as $feedback)
        {{ $feedback->pivot->comment}}
    @endforeach
</div>