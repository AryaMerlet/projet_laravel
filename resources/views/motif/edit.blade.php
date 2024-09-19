@extends('layouts.app')

@section('content')
<form action="{{route('motif.update',['motif'=>$motif->id])}}" method="POST">
    @csrf
    @method('put')
        <input type="text" value="{{old('description', $motif->description)}}" name="description">
    @error('description')
        <div style="color:red">{{$message}}</div>
    @enderror
    <input type="submit" value="modifier">
</form>
@endsection
