@extends('website.partials.master')

@section('title' , 'تعديل الايجار')

@section('content')

    @include('website.partials.navbar' , ['all_rentals_active' => true])
    <div class="container">

        <div class="page-header">
            <h1>تعديل الايجار</h1>
        </div>

        @include('errors.input')

        {{ Form::model($rental , ['route' => ['update_rental' , $rental->id] , 'files' => true, 'class'=>'form-inline']) }}

            @include('website.rentals.rental_form')

            <br><br>

            <div class="form-group">
                {{ Form::submit( 'تعديل الايجار' , ['name' => 'update_rental' , 'class' => 'btn btn-success'])  }}
            </div>

        {{ Form::close()  }}

    </div>

@endsection