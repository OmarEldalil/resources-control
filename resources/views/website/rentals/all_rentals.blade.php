@extends('website.partials.master')

@section('title' , 'الايجارات')

@section('content')

    @include('website.partials.navbar' , ['all_rentals_active' => true])

    <div class="container-fluid">

        @include('website.partials.success')

        <div class="clearfix"></div>
        <div class="tag">
            <p>ايجارات المكاتب و المخازن و الاستراحات</p>
        </div>

        @if ($user->authority('admin'))

            <a class="btn btn-primary" href="{{ route('create_rental') }}">
                <span class="glyphicon glyphicon-user"></span>
                اضافة ايجار جديد
            </a>

            <a class="btn btn-success" href="{{ route('excel_extract' , 'rental') }}">
                <span class="glyphicon glyphicon-file"></span>
    ملف الأكسيل
            </a>

        @endif

        <table class="table-bordered table-responsive data" id="rentals-table">
            <thead>
                <th >
                    مسلسل
                </th>
                <th >
                    المحافظة
                </th>
                <th >
                    العنوان تفصيلاً
                </th>
                <th >
                    الوصف
                </th>
                <th >
                    المالك
                </th>
                <th >
                    المؤجر
                </th>
                <th >
                    بداية التعاقد
                </th>
                <th >
                    نهاية التعاقد
                </th>
                <th >
                    القيمة الايجارية الشهرية
                </th>
                <th >
                    طريقة السداد
                </th>
                <th >
                    التأمين
                </th>
                <th >
                    الزيادة السنوية
                </th>
                <th >
                    ملاحظات
                </th>
                <th >
التفاصيل
                </th>
                @if ($user->authority('admin') || $user->canEdit('rentals'))
                    <th>
        تعديل
                    </th>
                @endif
                @if($user->authority('admin'))
                    <th>
            حذف
                    </th>
                @endif
            </thead>

            @if(count($rentals) > 0)

                <?php $counter = 1 ?>

                @foreach($rentals as $rental)

                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $rental->city }}</td>
                        <td>{{ $rental->address }}</td>
                        <td>{{ $rental->description }}</td>
                        <td>{{ $rental->owner }}</td>
                        <td>{{ $rental->renter }}</td>
                        <td>{{ $rental->contract_start_date }}</td>
                        <td>{{ $rental->contract_end_date }}</td>
                        <td>{{ $rental->rental_cost }}</td>
                        <td>{{ $rental->payment_method }}</td>
                        <td>{{ $rental->insurance }}</td>
                        <td>{{ $rental->annual_raise }}</td>
                        <td>{{ $rental->notes }}</td>

                        <td><a  class="btn btn-info" href="{{ route('single_rental' , $rental->id) }}">التفاصيل</a> </td>

                        @if ($user->authority('admin') || $user->canEdit('rentals'))

                            <td><a  class="btn btn-primary" href="{{ route('edit_rental' , $rental->id) }}">تعديل</a> </td>

                        @endif

                        @if ($user->authority('admin'))
                            <td><a  class="btn btn-danger delete-btn" href="{{ route('delete_rental' , $rental->id) }}">حذف</a> </td>
                        @endif

                    </tr>

                @endforeach

            @endif

        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#rentals-table').DataTable( {
                fixedHeader: true,
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