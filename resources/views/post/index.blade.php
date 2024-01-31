@extends('layouts.app')
@section('title', 'Title')
@section('content')
    {{-- For loop --}}
    {{-- 
    @foreach($posts as $key => $post)
        <div>{{$key}}.{{$post['title']}}.{{$post['content']}}</div>
    @endforeach
    --}}

    {{-- More control inside loops --}}
    @if(count($posts))
        @foreach($posts as $key => $post)
            {{-- <div>{{$key}}.{{$post['title']}}.{{$post['content']}}</div> --}}

            {{-- @break($key == 2) --}}
            {{-- @continue($key == 2) --}}

            @if($loop->even)
                <div>{{$key}}.{{$post['title']}}.{{$post['content']}}</div>
            @else
                <div style="background-color: silver;">{{$key}}.{{$post['title']}}.{{$post['content']}}</div>
            @endif
        @endforeach
    @endif

    {{-- For loop --}}
    {{-- 
    @for($i = 0; $i <= 10; $i++)
        {{$i}}
    @endfor
    --}}
@endsection