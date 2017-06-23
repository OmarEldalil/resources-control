@extends('website.partials.master')

@section('title' , 'أضافة موظف جديد')

@section('content')

    @include('website.partials.navbar' , ['all_employees_active' => true])

    <div class="container">

        <div class="page-header">
            <h1>أضافة موظف جديد</h1>
        </div>

        @include('errors.input')
        @include('website.partials.success')

        {{ Form::open(['route' => 'save_employee' , 'files' => true , 'class'=>'form-inline']) }}

            @include('website.employee_formm')

            <div class="form-group">
                {{ Form::submit( 'اضافة الموظف' , ['name' => 'save_employee' , 'class' => 'btn btn-success', 'style'=>'position: relative;
    top: 28px;
    right: 20px;'])  }}
            </div>

        {{ Form::close()  }}

    </div>

@endsection