@extends('website.partials.master')

@section('title' , 'الموافقة علي الاجازات')

@section('content')

    @include('website.partials.navbar' , ['vacations_index_active' => true])

    <div class="container-fluid">

        <table class="table table-bordered table-responsive vac" id="approvals_table">

            <thead>

                <tr>
                    <th style="width: 200px">الاسم</th>
                    <th>الكود</th>
                    <th>المكتب</th>
                    <th>الوظيفة</th>
                    <th>رقم التليفون الحالي (الشركة)</th>
                    <th>رقم تليفون الطوارئ</th>
                    <th>العنوان</th>
                    <th>مقدم الأجازة</th>
                    <th>مدة الاجازة</th>
                    <th>نوع الاجازة</th>
                    <th>صورة المرضية</th>
                    <th>تاريخ بداية الاجازة</th>
                    <th>تاريخ نهاية الاجازة</th>
                    <th>تاريخ تقديم الاجازة</th>
                    <th>موافقة</th>
                    <th>رفض</th>
                    <th>الحالة</th>
                </tr>

            </thead>

            <tbody>

                @if(count($vacationRequests))

                    @foreach($vacationRequests as $vacationRequest)

                        <tr>
                            <td>{{ $vacationRequest->employee->name }}</td>
                            <td>{{ $vacationRequest->employee->code }}</td>
                            <td>{{ $vacationRequest->employee->office }}</td>
                            <td>{{ $vacationRequest->employee->position }}</td>
                            <td>{{ $vacationRequest->employee->company_mobile }}</td>
                            <td>{{ $vacationRequest->employee->emergency_phone }}</td>
                            <td>{{ $vacationRequest->employee->address }}</td>
                            <td>{{ $vacationRequest->user->name }}</td>
                            <td>{{ $vacationRequest->vacation_duration }}</td>
                            <td>{{ $vacationRequest->vacation_type }}</td>
                            <td>
                                @if ($vacationRequest->sick_image)
                                    <a href="{{ asset('imgs/sick_images/' . $vacationRequest->sick_image) }}">مشاهدة الصورة</a>
                                @else
                                    ---
                                @endif
                            </td>
                            <td>{{ $vacationRequest->start_date }}</td>
                            <td>{{ $vacationRequest->end_date }}</td>
                            <td>{{ $vacationRequest->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="app_but">
                                    <button class="btn-success btn-cir btn-approve-vacation" style="margin-left: 5px" data-employee="{{ $vacationRequest->employee->name }}">
                                        <a href="{{ route('change_vacation_status' , [$vacationRequest->id , 'approved']) }}" >
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                        </a>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="app_but">
                                    <button class="btn-danger btn-cir btn-refuse-vacation" data-employee="{{ $vacationRequest->employee->name }}">
                                        <a href="{{ route('change_vacation_status' , [$vacationRequest->id , 'refused']) }}">
                                            <span class="glyphicon glyphicon-thumbs-down"></span>
                                        </a>
                                    </button>
                                </div>
                            </td>

                            <td
                                @if ($vacationRequest->status == 'معلقة')
                                    style="color: black;background: yellow"
                                @elseif($vacationRequest->status == 'موافقة')
                                    style="color: white;background: green"
                                @elseif($vacationRequest->status == 'رفض')
                                    style="color: white;background: red"
                                @endif
                            >
                                {{ $vacationRequest->status }}
                            </td>

                        </tr>

                    @endforeach

                @endif

            </tbody>

        </table>

    </div>

    <script>
        $("body").addClass("data_page");

        var table=$("#approvals_table").dataTable({
            "paging": false,
            "sorting": false,
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

        $(".btn-approve-vacation").on('click' , function (e) {

            if (!confirm('هل تريد الموافقة على الأجازة للموظف ' + $(this).data('employee') + ' ?')) {
                e.preventDefault();
            }

        });

        $(".btn-refuse-vacation").on('click' , function (e) {

            if (!confirm('هل تريد رفض الأجازة للموظف ' + $(this).data('employee') + ' ?')) {
                e.preventDefault();
            }

        });

    </script>

@endsection