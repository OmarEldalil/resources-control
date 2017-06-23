@extends('website.partials.master')

@section('title' , 'تعديل عضو ')

@section('content')

    @include('website.partials.navbar' , ['users_active' => true])

    <div class="container">

        <div class="page-header">
            <h1>تعديل عضو </h1>
        </div>

        @include('errors.input')
        @include('website.partials.success')

        {{ Form::model($selected_user , ['route' => ['update_user' , $selected_user->id] , 'files' => true]) }}

            @include('website.users.user_form')

            <div class="form-group" style="text-align: center">
                {{ Form::submit('تعديل العضو' , ['name' => 'update_user' , 'class' => 'btn btn-success'])  }}
            </div>

        {{ Form::close()  }}

    </div>

@endsection