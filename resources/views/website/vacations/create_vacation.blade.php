@extends('website.partials.master')

@section('title' , 'أضافة أجازة')

@section('content')

    @include('website.partials.navbar' , ['vacations_index_active' => true])

    <div class="container">

        <div class="page-header">

            <h1>
أضافة أجازة
            </h1>

        </div>

        @include('website.partials.failed')

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    {{ Form::open(['route' => 'save_vacation' , 'files' => 'true']) }}

                        <div class="form-group">

                            <h2>{{ Form::label('employee_code' , 'كود الموظف : ') }}</h2>
                            {{ Form::select('employee_code' , $employees_codes , null , ['class' => 'form-control']) }}

                        </div>

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

                            <h2>{{ Form::label('rest' , 'المتبقى : ') }}</h2>
                            {{ Form::number('rest' , null , ['id' => 'rest' , 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            {{ Form::submit('أضافة' , ['class' => 'btn btn-success']) }}

                        </div>

                    {{ Form::close() }}

                </div>

            </div>

        </div>

    </div>

@endsection