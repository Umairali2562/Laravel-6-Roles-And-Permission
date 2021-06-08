@extends('layouts.admin')



@section('content')
    <h1>Update Profile</h1>

    <div class="row">

        <div class="col-sm-3" style="margin: 16px">


            <img src="{{$user->photo?  str_replace("../","../",$user->photo->file) : 'http://placehold.it//400x400'}}" height='140px'>

        </div>

        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('Name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Photo_id','Image:') !!}
                {!! Form::file('photo_id',['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-2 mybtn']) !!}
                {!! Form::close() !!}


            </div>



    <div class="row">
        @include('includes.form_error')
    </div>

@stop
