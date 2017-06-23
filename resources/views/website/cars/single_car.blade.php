@extends('website.partials.master')

@section('title' , 'تعديل تفاصيل السيارة')

@section('content')

    @include('website.partials.navbar' , ['all_cars_active' => true])

    <div class="container details-page">

        <table class="table table-responsive table-bordered data indv">
            <tr>
                <th>
                    مسلسل
                </th>
                <td>
                    {{ $car->id }}
                </td>

                <th>
                    رقم السيارة
                </th>
                <td>
                    {{ $car->car_number }}
                </td>
            </tr>
            <tr>
                <th>
                    ماركة و نوع السيارة
                </th>
                <td>
                    {{ $car->car_model }}
                </td>

                <th>
                    موديل السيارة
                </th>
                <td>
                    {{ $car->car_year }}
                </td>
            </tr>
            <tr>
                <th>
                    المكتب التابع له
                </th>
                <td>
                    {{ $car->office }}
                </td>

                <th width="150px">
                    تاريخ انتهاء رخصة السيارة
                </th>
                <td>
                    {{ $car->car_license_date }}
                </td>
            </tr>
            <tr>
                <th>
                    تاريخ الفحص
                </th>
                <td>
                    {{ $car->examination_date }}
                </td>

                <th>
                    اسم السائق الرباعي
                </th>
                <td>
                    {{ $car->driver_name }}
                </td>
            </tr>
            <tr>
                <th>
                    تاريخ انتهاء رخصة السائق
                </th>
                <td>
                    {{ $car->driver_license_date }}
                </td>

                <th>
                    نوع رخصة السائق
                </th>
                <td>
                    {{ $car->license_type }}
                </td>
            </tr>
            <tr>
                <th>
                    Vendor
                </th>
                <td>
                    {{ $car->vendor }}
                </td>
            </tr>
        </table>
        <table class="table table-responsive table-bordered data indv" style="margin-top: 20px">
            @foreach($carImageInputs as $carImageInput)

                    <tr>
                        <th style="width: 200px;">
                            {{ trans('cars_image_inputs.' . $carImageInput) }}
                        </th>
                        <td>
                            @if ($imageName =  $car->$carImageInput)

                                <a href="{{ asset('imgs/cars/' . $imageName) }}">

                                    <img src="{{ asset('imgs/cars/' . $imageName) }}">

                                </a>

                            @endif
                        </td>
                    </tr>

            @endforeach

        </table>
    </div>

@endsection

