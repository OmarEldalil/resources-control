<table class="table">
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('car_number' , 'رقم السيارة : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('car_number' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('car_model' , 'ماركة ونوع السيارة : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('car_model' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('car_year' , 'موديل السيارة : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::number('car_year' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('office' , 'المكتب التابع له : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('office' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4 style="width: 95px;">{{ Form::label('car_license_date' , 'تاريخ انتهاء رخصة السيارة : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::date('car_license_date' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('examination_date' , 'تاريخ الفحص : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::date('examination_date' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('driver_name' , 'اسم السائق رباعي : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('driver_name' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('driver_license_date' , 'تاريخ انتهاء رخصة السائق : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::date('driver_license_date' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('license_type' , 'نوع رخصة السائق : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('license_type' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
    <tr>
        <th>
            <h4>{{ Form::label('vendor' , 'Vendor : ') }}</h4>
        </th>
        <td>
            {{ Form::text('vendor' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
</table>

@if (isset($car))

    @foreach($carImageInputs as $carImageInput)

        @if ($imageName =  $car->$carImageInput)

            <h4>{{ trans('cars_image_inputs.' . $carImageInput) }}</h4>

            <img style="max-width: 400px;" src="{{ asset('imgs/cars/' . $imageName) }}">

                <br>
                <br>
                    <a class="delete-btn btn btn-danger" href="{{ route('delete_car_image' , [$car->id , $carImageInput]) }}">حذف</a>
                <div class="clearfix"></div>
                <br>
        @else

            <div class="form-group">
                <h4>{{ Form::label($carImageInput , trans('cars_image_inputs.' . $carImageInput)) }}</h4>
                {{ Form::file($carImageInput ,  ['class' => 'form-control']) }}
            </div>

        @endif

    @endforeach

@else

    <table class="table">
        <tr>
            <th class="label-table">
                <h4>{{ Form::label('car_front_license' , ' وجه رخصة السيارة : ') }}</h4>
            </th>
            <td>
                {{ Form::file('car_front_license' ,  ['class' => 'form-control']) }}
            </td>
            <th class="label-table">
                <h4>{{ Form::label('car_back_license' , 'ضهر رخصة السيارة : ') }}</h4>
            </th>
            <td>
                {{ Form::file('car_back_license' , ['class' => 'form-control']) }}
            </td>
            <th class="label-table">
                <h4>{{ Form::label('driver_front_id' , 'وجه بطاقة السائق : ') }}</h4>
            </th>
            <td>
                {{ Form::file('driver_front_id' , ['class' => 'form-control']) }}
            </td>
        </tr>
        <tr>
            <th class="label-table">
                <h4>{{ Form::label('driver_front_license' , 'وجه رخصة السائق : ') }}</h4>
            </th>
            <td>
                {{ Form::file('driver_front_license' , ['class' => 'form-control']) }}
            </td>
            <th class="label-table">
                <h4>{{ Form::label('driver_back_license' , 'ضهر رخصة السائق : ') }}</h4>
            </th>
            <td>
                {{ Form::file('driver_back_license' , ['class' => 'form-control']) }}
            </td>
            <th class="label-table">
                <h4>{{ Form::label('driver_back_id' , 'ضهر بطاقة السائق : ') }}</h4>
            </th>
            <td>
                {{ Form::file('driver_back_id' ,['class' => 'form-control']) }}
            </td>
        </tr>
    </table>
    {{--<div class="form-group">--}}
        {{--<h4>{{ Form::label('car_front_license' , ' وجه رخصة السيارة : ') }}</h4>--}}
        {{--{{ Form::file('car_front_license' ,  ['class' => 'form-control']) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<h4>{{ Form::label('car_back_license' , 'ضهر رخصة السيارة : ') }}</h4>--}}
        {{--{{ Form::file('car_back_license' , ['class' => 'form-control']) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<h4>{{ Form::label('driver_front_id' , 'وجه بطاقة السائق : ') }}</h4>--}}
        {{--{{ Form::file('driver_front_id' , ['class' => 'form-control']) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<h4>{{ Form::label('driver_back_id' , 'ضهر بطاقة السائق : ') }}</h4>--}}
        {{--{{ Form::file('driver_back_id' ,['class' => 'form-control']) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<h4>{{ Form::label('driver_front_license' , 'وجه رخصة السائق : ') }}</h4>--}}
        {{--{{ Form::file('driver_front_license' , ['class' => 'form-control']) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<h4>{{ Form::label('driver_back_license' , 'ضهر رخصة السائق : ') }}</h4>--}}
        {{--{{ Form::file('driver_back_license' , ['class' => 'form-control']) }}--}}
    {{--</div>--}}

@endif
