@extends('layout.app')

@section('content')
    <ul class="list-group">
        @foreach($list as $item)
            <li class="list-group-item">{{ $item->name }}</li>
        @endforeach
    </ul>

    {{ $list->links('partials.page',['elements'=>$list]) }}
@endsection