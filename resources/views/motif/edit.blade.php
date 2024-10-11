@extends('layouts.app')

@section('content')
{{-- <form action="{{route('motif.update',['motif'=>$motif->id])}}" method="POST">
    @csrf
    @method('put') --}}
    <x-inputs.forms route="{{route('motif.update',['motif'=>$motif->id])}}" method="put">
        <x-inputs.texts property="description" label="{{__('label')}}" default="{{$motif->description}}"/>
        <input type="submit" value="modifier">
    </x-inputs.forms>
@endsection
