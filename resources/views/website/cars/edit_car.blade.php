@extends('website.partials.master')

@section('title' , 'تعديل تفاصيل السيارة')


@section('content')

    @include('website.partials.navbar' , ['all_cars_active' => true])


    <div class="container">

        <div class="page-header">
            <h1>تعديل السيارة</h1>
        </div>

        @include('errors.input')
        @include('website.partials.success')

        {{ Form::model($car , ['route' => ['update_car' , $car->id] , 'files' => true, 'class'=>'form-inline']) }}

            @include('website.cars.car_form')

            <div class="form-group">
                {{ Form::submit( 'تعديل السيارة' , ['name' => 'update_car' , 'class' => 'btn btn-success'])  }}
            </div>

        {{ Form::close()  }}

    </div>

@endsection