@extends('app')

@section('content')
    {{$mover}}<br>
    <form enctype="multipart/form-data" method="post" type="file" action="URL('/gallery/add')">
        Chose your file:
        <input name="uploaded_file" type="file"><br>
        <input type="submit" value="Upload!">
    </form>
@endsection