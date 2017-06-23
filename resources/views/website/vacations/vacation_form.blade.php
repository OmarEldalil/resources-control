@extends('website.partials.master')

@section('title' , 'طلب أجازة')

@section('content')

    @include('website.partials.navbar' , ['vacations_index_active' => true])

    <div class="container">

        <div class="page-header">

            <h1>
طلب أجازة للموظف :
                <span style="color: #178fe5">{{ $employee->name }}</span>
            </h1>

        </div>

        @include('website.partials.failed')

        {{ Form::open(['route' => 'vacations_post_apply' , 'class' => 'form-inline' , 'files' => 'true']) }}

        {{ Form::hidden('employee_code' , $employee->code) }}

            <div class="form-group">

                <strong>{{ Form::label('start_date' , 'تاريح بدء الأجازة : ') }}</strong>
                {{ Form::date('start_date' , null , ['id' => 'start_date' , 'class' => 'form-control' , 'required']) }}

            </div>

            <div class="form-group">

                <strong>{{ Form::label('end_date' , 'تاريح نهاية الأجازة : ') }}</strong>
                {{ Form::date('end_date' , null , ['id' => 'end_date' , 'class' => 'form-control' , 'required']) }}

            </div>

        <br><br><br>

            <div class="form-group">

                {{ Form::label('vacation_type' , 'نوع الأجازة : ') }}
                {{ Form::select('vacation_type' , ['سنوية'=>'سنوية' , 'عارضة'=> 'عارضة','مرضية'=>'مرضية' , 'أخرى'=>'أخرى'] , null , ['id' => 'vacation_type' , 'class' => 'form-control']) }}

            </div>

        <br><br><br>

            <div class="form-group" id="sick-image-container" style="display: none">

                {{ Form::label('sick_image' , 'صورة ما يثبت الحالة المرضية : ') }}
                {{ Form::file('sick_image' , ['class' => 'form-control' , 'id' => 'sick_image']) }}

            </div>

        <br><br><br>

            <div class="form-group">

                {{ Form::submit('أرسال الطلب' , ['class' => 'btn btn-success']) }}

            </div>

        {{ Form::close() }}

    </div>

    <script>

        $('#vacation_type').on('click' , function() {

            if ($(this).val() == 'مرضية') {

                $('#sick-image-container').show();

            }

            if ($(this).val() != 'مرضية') {

                $('#sick-image-container').hide();

            }

        });

    </script>

@endsection