@props(['route','method'])

<form action="{{$route}}" method="POST">
    @csrf
    @method('{{$method}}')
    {{$slot}}
</form>
