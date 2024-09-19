@extends('layouts.app')

@section('content')
<form action="{{route('motif.store')}}" method="POST">
    @csrf
    <input type="text" name="description" value="{{old('description')}}">
    @error('description')
        <div style="color:red">{{$message}}</div>
    @enderror
    <input type="submit" value="create">
</form>
@endsection
