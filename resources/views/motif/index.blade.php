@extends('layouts.app')

@section('content')

{{-- @if(Session::has('message'))
    <p class="badge bg-warning">{{session('message')}}</p>
@endif --}}
<table>
    <thead>
        <tr>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>


@foreach ($motifs as $motif)
        <tr>
            <td>
                <div>
                    <a href="{{route('motif.edit',['motif'=>$motif->id])}}">{{$motif->description}}</a>
                </div>
            </td>
            <td>
                @if ($motif->deleted_at == null)

                @endif
                <form action="{{route('motif.destroy', ['motif'=>$motif->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="supprimer" class="btn-danger">
                </form>
            </td>
        </tr>
@endforeach
</tbody>
</table>
<div>
    <a href="{{route('motif.create')}}">Create new motif</a>
</div>

@endsection
