@extends('layouts.app')

@section('content')
	<div
		id="react-file-detail"
		data-file-id="{{$file->id}}"
		data-file-name="{{$file->name}}"
		data-file-size-mb="{{$file->getSizeMb()}}"
		data-file-download-count="{{$file->downloads()->count()}}"
	></div>
@endsection
