@props(['property','label','default'])

<label for="{{$property}}">{{__('label')}}</label>
<input type="text" name="{{$property}}" id="{{$property}}" value="{{old('property', $default)}}">
<x-inputs.errors property="{{$property}}" />
