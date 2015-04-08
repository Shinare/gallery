@extends('app')

@section('content')
    @if(isset($mover)==true)
        {{$mover}}
    @endif
    <form enctype="multipart/form-data" method="post" type="file" action="{{URL('/gallery/add')}}">
        Chose your file:
        <input name="uploaded_file" type="file"><br>
        <input type="submit" value="Upload!">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
@endsection