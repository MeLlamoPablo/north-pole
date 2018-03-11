@extends('layouts.app')

@section('content')
	<div 
		id="react-user-detail"
		data-is-own-user="{{ $isOwnUser }}"
		data-user-avatar="{{ Gravatar::get($user->email) }}"
		data-user-name="{{ $user->username }}"
		data-user-email="{{ $user->email }}"
		data-user-first-name="{{ $user->name }}"
		data-user-last-name="{{ $user->lastName }}"
		data-user-website="{{ $user->website }}"
		data-user-about="{{ $user->about }}"
	></div>
@endsection
