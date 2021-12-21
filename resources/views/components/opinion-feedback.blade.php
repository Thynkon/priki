<div class="w-full">
    <div class="flex justify-between bg-sky-50 shadow p-4 my-4 rounded">
        <div>
            {{ $user->pivot->comment}}
        </div>
        <div class="bg-green-200 p-1 rounded">
            <a href="{{ route('user.show', ['user' => $user->id]) }})">{{ $user->fullname}}</a>
        </div>
    </div>
</div>