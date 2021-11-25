@extends('layout.base')

@section('title')
    Page d'accueil
@endsection

@section('body')
    @forelse($practices as $practice)
        <div>
            <p>{{ $practice->description }}</p>
            <p>{{ $practice->updated_at->translatedFormat('l jS F Y')}}</p>
        </div>
    @empty
        <div>
            <p>Aucune practice à afficher ici</p>
        </div>
    @endforelse
@endsection
