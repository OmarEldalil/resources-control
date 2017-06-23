@extends('website.partials.master')

@section('title' , 'تعديل موظف')

@section('content')

    @include('website.partials.navbar' , ['all_employees_active' => true])

    <div class="container">

        <div >
            <h1>تعديل موظف</h1>
            <br/>
        </div>

        @include('errors.input')
        @include('website.partials.success')

        {{ Form::model($employee , ['route' => ['update_employee' , $employee->id] , 'files' => true, 'class'=>'form-inline']) }}

        @include('website.employee_formm')

        <div class="form-group">
            {{ Form::submit( 'تعديل الموظف' , ['name' => 'save_employee' , 'class' => 'btn btn-success', 'style'=>'position: relative;
    top: 28px;
    right: 20px;'])  }}
        </div>

        {{ Form::close()  }}

    </div>

@endsection