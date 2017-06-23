@extends('website.partials.master')

@section('title' , 'اضافة سيارة')


@section('content')

    @include('website.partials.navbar' , ['all_cars_active' => true])


    <div class="container">

        <div class="page-header">
            <h1>أضافة سيارة جديدة</h1>
        </div>

        @include('errors.input')
        @include('website.partials.success')

        {{ Form::open(['route' => 'save_car' , 'files' => true, 'class'=>'form-inline']) }}

            @include('website.cars.car_form')

            <div class="form-group">
                {{ Form::submit( 'اضافة السيارة' , ['name' => 'save_car' , 'class' => 'btn btn-success', 'style'=>'position: relative;
    top: 28px;
    right: 20px;'])  }}
            </div>

        {{ Form::close()  }}

    </div>

@endsection