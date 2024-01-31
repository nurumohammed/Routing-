@extends('layouts.app')
@section('title','show page')
@section('content')
 
@if($post['is_new'])
    <h1>networking</h1>
@elseif($post['is_new'] == false)
    <h2>duid</h2>
@endif
@unless($post['is_new'])
<div>using unless</div>
@endunless

@isset($post['has_comments'])
<div>this is isset posts </div>
@endisset


<h1>{{$post['title']}}</h1>
<p>{{$post['content']}}</p>

@endsection