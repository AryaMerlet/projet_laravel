@extends('layouts.app')

@section('content')

<x-inputs.forms route="{{route('absence.create')}}" method="post">
</x-inputs.forms>

<form action="{{route('absence.store')}}" method="POST">
    @csrf
    <input type="text" name="description" value="{{old('description')}}">
    @error('description')
        <div style="color:red">{{$message}}</div>
    @enderror
    <input type="submit" value="create">
</form>

@endsection
