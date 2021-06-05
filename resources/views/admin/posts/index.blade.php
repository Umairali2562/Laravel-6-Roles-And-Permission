@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>
@can('Administrator')
    @include('includes.Admin_Posts');
@endcan

@cannot('Administrator')
    @include('includes.Agent_Posts');
@endcannot

@endsection

