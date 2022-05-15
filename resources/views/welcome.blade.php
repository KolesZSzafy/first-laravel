@extends('layout.main')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($games as $item)
        <div class="col record">
            <img src="{{$item->img_path}}">
            <h3>{{$item->title}}</h3>
            <a href="{{route('game.show', ['name'=> $item->title, 'id' => $item->id])}}" class="text-white text-decoration-none"><button class="btn btn-dark">More</button></a>
        </div>
        @endforeach
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            @if ($pageNumber>1)
            <li class="page-item">
            <a href="/page{{$pageNumber-1 . $linkParams}}" class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="/page{{$pageNumber-1 . $linkParams}}">{{$pageNumber-1}}</a></li>
            @else
                <li class="page-item disabled">
                    <a href="/page{{$pageNumber-1 . $linkParams}}" class="page-link">Previous</a>
                </li>
            @endif
            <li class="page-item active" aria-current="page">
                <span class="page-link">{{$pageNumber}}</span>
            </li>
            @if ($maxPage > $pageNumber)
                <li class="page-item"><a class="page-link" href="/page{{$pageNumber+1 . $linkParams}}">{{$pageNumber+1}}</a></li>
                <li class="page-item">
                <a href="/page{{$pageNumber+1 . $linkParams}}" class="page-link">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a href="/page{{$pageNumber+1 . $linkParams}}" class="page-link">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endsection