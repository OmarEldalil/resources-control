@extends('website.partials.master')

@section('title' , 'تعديل أجازة')

@section('content')

    @include('website.partials.navbar' , ['vacations_index_active' => true])

    <div class="container">

        <div class="page-header">

            <h1>
تعديل أجازة للموظف
                <span style="color: #178fe5">{{ $vacation->employee->name }}</span>
            </h1>

        </div>

        @include('website.partials.failed')

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    {{ Form::model($vacation , ['route' => ['update_vacation' , $vacation->id] , 'files' => 'true']) }}

                    {{ Form::hidden('employee_code' , $vacation->employee->code) }}

                        <div class="form-group">

                            <h2>{{ Form::label('annual' , 'سنوية : ') }}</h2>
                            {{ Form::number('annual' , null , ['id' => 'annual' , 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            <h2>{{ Form::label('casual' , 'عارضة : ') }}</h2>
                            {{ Form::number('casual' , null , ['id' => 'casual' , 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            <h2>{{ Form::label('sick' , 'مرضية : ') }}</h2>
                            {{ Form::number('sick' , null , ['id' => 'sick' , 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            <h2>{{ Form::label('sick' , 'مرضية : ') }}</h2>
                            {{ Form::number('sick' , null , ['id' => 'sick' , 'class' => 'form-control']) }}

                        </div>


                        <div class="form-group">

                            <h2>{{ Form::label('rest' , 'المتبقى : ') }}</h2>
                            {{ Form::number('rest' , null , ['id' => 'rest' , 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            {{ Form::submit('تعديل' , ['class' => 'btn btn-success']) }}

                        </div>

                    {{ Form::close() }}

                </div>

            </div>

        </div>

    </div>

@endsection