@extends('website.partials.master')

@section('title' , 'اضافة ايجار')

@section('content')

    @include('website.partials.navbar' , ['all_rentals_active' => true])


    <div class="container">

        <div class="page-header">
            <h1>أضافة ايجار جديدة</h1>
        </div>

        @include('errors.input')

        {{ Form::open(['route' => 'save_rental' , 'files' => true, 'class'=>'form-inline']) }}

            @include('website.rentals.rental_form')

            <div class="form-group">
                {{ Form::submit( 'اضافة الايجار' , ['name' => 'save_rental' , 'class' => 'btn btn-success', 'class' => 'btn btn-success', 'style'=>'position: relative;
    top: 28px;
    right: 20px;'])  }}
            </div>

        {{ Form::close()  }}

    </div>

@endsection