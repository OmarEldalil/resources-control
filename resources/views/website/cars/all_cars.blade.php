@extends('website.partials.master')

@section('title' , 'سيارات الشركة')

@section('content')

    @include('website.partials.navbar' , ['all_cars_active' => true])

    <div class="container-fluid">

        <div class="clearfix"></div>


        <div class="tag">
            <p>سيارات شركة الشرق للخدمات البترولية
            </p>
        </div>

        @if($user->authority('admin'))

            <a class="btn btn-primary" href="{{ route('create_car') }}">
                <span class="glyphicon glyphicon-user"></span>
                اضافة سيارة جديدة
            </a>


            <a class="btn btn-success" href="{{ route('excel_extract' , 'car') }}">
                <span class="glyphicon glyphicon-file"></span>
ملف الأكسيل
            </a>

        @endif

        <table class="table-bordered data" id="cars_table">

            <thead>

                <th>
                    مسلسل
                </th>
                <th>
                    رقم السيارة
                </th>
                <th>
                    ماركة و نوع السيارة
                </th>
                <th>
                    موديل السيارة
                </th>
                <th>
                    المكتب التابع له
                </th>
                <th>
                    تاريخ انتهاء رخصة السيارة
                </th>
                <th>
                    تاريخ الفحص
                </th>
                <!--       7tet hna width 34an l inline-block         -->
                <th >
                    اسم السائق الرباعي
                </th>
                <th>
                    تاريخ انتهاء رخصة السائق
                </th>
                <th>
                    نوع رخصة السائق
                </th>
                <th>
                    Vendor
                </th>


                <th>
                    التفاصيل
                </th>

                @if ($user->authority('admin') || $user->canEdit('cars'))

                    <th>
                        تعديل
                    </th>

                @endif

                @if ($user->authority('admin'))
                    <th>
        حذف
                    </th>
                @endif

            </thead>

            @if(count($cars) > 0)

                <?php $counter = 1 ?>

                @foreach($cars as $car)

                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $car->car_number }}</td>
                        <td>{{ $car->car_model }}</td>
                        <td>{{ $car->car_year }}</td>
                        <td>{{ $car->office }}</td>
                        <td>{{ $car->car_license_date }}</td>
                        <td>{{ $car->examination_date }}</td>
                        <td>{{ $car->driver_name }}</td>
                        <td>{{ $car->driver_license_date }}</td>
                        <td>{{ $car->license_type}}</td>
                        <td>{{ $car->vendor }}</td>

                        <td><a  class="btn btn-info" href="{{ route('single_car' , $car->id) }}">التفاصيل</a> </td>

                        @if ($user->authority('admin') || $user->canEdit('cars'))

                            <td><a  class="btn btn-primary" href="{{ route('edit_car' , $car->id) }}">تعديل</a> </td>

                        @endif

                        @if ($user->authority('admin'))

                            <td><a  class="btn btn-danger delete-btn" href="{{ route('delete_car' , $car->id) }}">حذف</a> </td>

                        @endif

                    </tr>

                @endforeach

            @else

                <tr>
                    <td colspan="14"><h1>لايوجد سيارات حاليا</h1></td>
                </tr>

            @endif

        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#cars_table').DataTable( {
                fixedHeader: true,
                //"lengthMenu": [[25, 50, -1], [25, 50, "All"]],
                "iDisplayLength": 25,
                "oLanguage": {
                    "sLengthMenu": "اعرض _MENU_                  ",
                    "sZeroRecords": "لم يتم العثور علي اي نتائج",
                    "sInfoEmpty": "لم يتم العثور علي اي نتائج       ",
                    "sInfoFiltered": "تصفية من (_MAX_) ناتج",
                    "sInfo": "عرض النتائج  من (_START_ الي _END_) من أصل (_TOTAL_) ناتج",
                    "sSearch": "ابحث: ",
                    "oPaginate": {
                        "sNext": "التالي",
                        "sPrevious": "السابق"
                    }
                }
            } );
        } );
    </script>

@endsection