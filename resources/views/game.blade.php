@extends('layout.main')

@section('content')
        <img src="{{$game->img_path}}">
        <h1 class="fs-1">{{$game->title}}</h1>
        <h2>{{$game->score}}/5</h2>
        <h3>Gatunek: {{$game->genre->name}}</h3>
        <p>Opis: {{$game->description}}</p>
        <p>Wydawca: {{$game->publisher}}</p>
        <p>Stworzono: {{$game->created_at}}</p>
        @if ($game->updated_at != null)
            <p>Uaktualniono: {{$game->updated_at}}</p>
        @endif
@endsection