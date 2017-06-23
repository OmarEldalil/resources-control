@extends('website.partials.master')

@section('title' , 'الأيجارات')

@section('content')

    @include('website.partials.navbar' , ['all_rentals_active' => true])

    <div class="container">
        <table class="table table-responsive table-bordered data indv">
            <tr>
                <th>
                    المحافظة
                </th>
                <td>
                    {{ $rental->city }}
                </td>
            </tr>
            <tr>
                <th>
                    العنوان تفصيلاً
                </th>
                <td>
{{ $rental->address }}
                </td>

                <th>
                    الوصف
                </th>
                <td>
{{ $rental->description }}
                </td>
            </tr>
            <tr>
                <th>
                    المالك
                </th>
                <td>
{{ $rental->owner }}
                </td>

                <th>
                    المؤجر
                </th>
                <td>
{{ $rental->renter }}
                </td>
            </tr>
            <tr>
                <th>
                    بداية التعاقد
                </th>
                <td>
{{ $rental->contract_start_date }}
                </td>

                <th>
                    نهاية التعاقد
                </th>
                <td>
{{ $rental->contract_end_date }}
                </td>
            </tr>
            <tr>
                <th>
                    القيمة الايجارية الشهرية
                </th>
                <td>
{{ $rental->rental_cost }}
                </td>

                <th>
                    طريقة السداد
                </th>
                <td>
{{ $rental->payment_method }}
                </td>
            </tr>
            <tr>
                <th>
                    التأمين
                </th>
                <td>
{{ $rental->insurance }}
                </td>

                <th>
                    الزيادة السنوية
                </th>
                <td>
{{ $rental->annual_raise }}
                </td>
            </tr>
            <tr>
                <th>
                    ملاحظات
                </th>
                <td>
{{ $rental->notes }}
                </td>
            </tr>
            <tr>
                <th style="vertical-align: top">
نسخ الأيجار
                </th>
                <td>

                    @if (count($rental->images))

                        @foreach($rental->images as $image)

                            <img style="max-width: 500px" src="{{ asset('imgs/rentals/' . $image->image_name) }}">

                            <hr>

                        @endforeach

                    @endif

                </td>
            </tr>
        </table>
    </div>

@endsection