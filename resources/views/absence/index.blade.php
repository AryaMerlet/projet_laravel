@extends('layouts.app')

@section('content')

{{-- @if(Session::has('message'))
    <p class="badge bg-warning">{{session('message')}}</p>
@endif --}}
<table>
    <thead>
        <tr>
            <th>Description</th>
            <th>Leave start</th>
            <th>Leave end</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absences as $absence)
        <tr>
            <td>
                <div>
                    <p>{{$absence->motif->description}}</p>
                    {{-- <p>{{$motifs->description}}</p> --}}
                </div>
            </td>
            <td>
                <div>
                    <p>{{$absencesUser->startleave}}</p>
                </div>
            </td>
            <td>
                <div>
                    <p>{{$absence->duration}}</p>
                </div>
            </td>
            <td>
                <div>
                    <p>{{$absencesUser->description}}</p>
                </div>
            </td>
            <td>
                <div>
                    {{-- <p>{{$user->firstname}} {{$user->lastname}}</p> --}}
                </div>
            </td>
            <td>
                <div>
                    <a href="{{route('absence.edit',['absence'=>$absence->id])}}">modify</a>
                </div>
            </td>
            <td>
                @if ($absence->deleted_at == null)

                @endif
                <form action="{{route('absence.destroy', ['absence'=>$absence->id])}}" method="post">
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
    <a href="{{route('absence.create')}}">Create new leave</a>
</div>

@endsection
