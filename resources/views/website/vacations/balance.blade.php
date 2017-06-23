@extends('website.partials.master')

@section('title' , 'رصيد الاجازات')

@section('content')

    @include('website.partials.navbar' , ['vacations_index_active' => true])

        <div class="tag">
            <p>
                رصيد الاجازات
            </p>
        </div>

        @include('website.partials.success')
        @include('website.partials.failed')

    <div class="container">

        @if ($currentEmployee->vacation)

            @if($currentEmployee->vacation->created_at <= \Carbon\Carbon::now())

                <div class="definition">
                    <p class="bold">رصيد اجازاتي</p>
                    <button class="btn-primary">
                        <a href="{{ route('vacations_get_apply' , [$currentEmployee->code]) }}">
                            <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true">
                            </span> تقديم طلب اجازة
                        </a>
                    </button>
                </div>

                <table class="table table-bordered table-responsive vac">
                    <thead>
                    <th style="width: 200px;">
                        الاسم
                    </th>
                    <th>
                        الكود
                    </th>
                    <th>
                        الرصيد المرحل السابق
                    </th>
                    <th>
                        الاجازات السنوية
                    </th>
                    <th>
                        اجازات العارضة
                    </th>
                    <th>
                        اجازات المرضي
                    </th>
                    <th>
                        اجمالي الاجازات
                    </th>
                    <th>
                        المتبقي
                    </th>

                    </thead>

                    <tbody>

                        <tr>
                            <td>
                                {{ $currentEmployee->name }}
                            </td>
                            <td>
                                {{ $currentEmployee->code }}
                            </td>
                            <td>
                                0
                            </td>
                            <td>
                                {{ $currentEmployee->vacation->annual }}
                            </td>
                            <td>
                                {{ $currentEmployee->vacation->casual }}
                            </td>
                            <td>
                                {{ $currentEmployee->vacation->sick }}
                            </td>
                            <td>
                                {{ $currentEmployee->vacation->total }}
                            </td>
                            <td>
                                {{ $currentEmployee->vacation->rest }}
                            </td>
                        </tr>

                    </tbody>

                </table>

            @endif

        @endif

            @if ($user->canEdit('vacations') || $user->authority('admin'))

                <div class="definition">
                    <p class="bold">رصيد اجازات العاملين (الفنيين)</p>
                </div>

                @if ($user->authority('admin'))
                    <a href="{{ route('create_vacation') }}" class="btn btn-info">
                        <span class="glyphicon glyphicon-adjust"></span>
    أضافة رصيد أجازة
                    </a>

                    <a href="{{ route('excel_extract' , 'vacation') }}" class="btn btn-success">
                        <span class="glyphicon glyphicon-file"></span>
                        ملف الأكسيل
                    </a>
                @endif

                <table class="table table-bordered table-responsive vac" id="emp_vac_table">

                    <thead>

                        <th>
                            الكود
                        </th>
                        <th style="width: 200px;">
                            الاسم
                        </th>
                        <th>
                            الرصيد المرحل السابق
                        </th>
                        <th>
                            الاجازات السنوية
                        </th>
                        <th>
                            اجازات العارضة
                        </th>
                        <th>
                            اجازات المرضي
                        </th>
                        <th>
                            اجمالي الاجازات
                        </th>
                        <th>
                            المتبقي
                        </th>
                        <th>
                            تقديم طلب اجازة
                        </th>
                        @if($user->authority('admin'))
                            <th>
                            تعديل
                            </th>
                        @endif
                    </thead>

                    <tbody>

                        @if(count($employees))

                            @foreach($employees as $employee)

                                @if ($employee->vacation)

                                    <tr>
                                        <td>
                                            {{ $employee->code }}
                                        </td>
                                        <td>
                                            {{ $employee->name }}
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            {{ $employee->vacation->annual }}
                                        </td>
                                        <td>
                                            {{ $employee->vacation->casual }}
                                        </td>
                                        <td>
                                            {{ $employee->vacation->sick }}
                                        </td>
                                        <td>
                                            {{ $employee->vacation->total }}
                                        </td>
                                        <td>
                                            {{ $employee->vacation->rest }}
                                        </td>
                                        <td>
                                            <button class="btn-primary">
                                                <a href="{{ route('vacations_get_apply' , $employee->code) }}">
                                                    <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true" style="float: left; padding-right: 6px"></span> تقديم طلب اجازة
                                                </a>
                                            </button>
                                        </td>
                                        @if($user->authority('admin'))
                                            <td>
                                                <button class="btn-info">
                                                    <a href="{{ route('edit_vacation' , $employee->vacation->id) }}">
                                                          تعديل
                                                    </a>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>

                                @endif

                            @endforeach

                        @endif

                    </tbody>

                </table>

            @endif

        </div>

        <script>

            $("body").addClass("data_page");
            $(".applied_vac span").mouseover(function(){
                $(".bubble").show("slow");
            });
            $(".applied_vac span").mouseout(function(){
                $(".bubble").hide();
            });

            var table = $("#emp_vac_table").dataTable({
                "paging": false,
                "oLanguage": {
                    "sLengthMenu": "اعرض _MENU_                  ",
                    "sZeroRecords": "لم يتم العثور علي اي نتائج",
                    "sInfoEmpty": "لم يتم العثور علي اي نتائج       ",
                    "sInfoFiltered": "تصفية من (_MAX_) ناتج",
                    "sInfo": "",
                    "sSearch": "ابحث: ",
                    "oPaginate": {
                        "sNext": "التالي",
                        "sPrevious": "السابق"
                    }
                },


                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                    );

                                    column
                                            .search( val ? '^'+val+'$' : '', true, false )
                                            .draw();
                                } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }

            });

        </script>

@endsection