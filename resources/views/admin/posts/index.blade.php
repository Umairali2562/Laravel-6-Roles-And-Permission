@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>
@can('Administrator')
    @include('includes.Admins.Posts.index')
@endcan

@cannot('Administrator')
    @include('includes.Users.Posts.index')
@endcannot

@endsection

