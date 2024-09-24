@extends('layouts.app')

@section('content')

<p>Bienvenue {{Auth::user()->firstname}}</p>
@can('motif-retrieve')
@endcan

@endsection
