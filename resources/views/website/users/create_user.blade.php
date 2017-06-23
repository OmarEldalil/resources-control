@extends('website.partials.master')

@section('title' , 'أضافة عضو جديد')

@section('content')

    @include('website.partials.navbar' , ['users_active' => true])

    <div class="container">

        <div class="page-header tag">
            <p>أضافة عضو جديد</p>
        </div>

        @include('errors.input')
        @include('website.partials.success')

        {{ Form::open(['route' => 'save_user' , 'files' => true, 'class'=>'form-horizontal']) }}

        @include('website.users.user_form')

        <div class="form-group" style="text-align: center">
            {{ Form::submit('أضافة العضو' , ['name' => 'save_user' , 'class' => 'btn btn-success'])  }}
        </div>

        {{ Form::close()  }}

    </div>

@endsection