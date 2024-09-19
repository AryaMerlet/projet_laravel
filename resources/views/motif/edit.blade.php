@extends('layouts.app')

@section('content')
<form action="{{route('motif.update',['motif'=>$motif->id])}}" method="POST">
    @csrf
    @method('put')
    <input type="text" value="{{$motif->description}}" name="description">
    <input type="submit" value="modifier">
</form>
@endsection
