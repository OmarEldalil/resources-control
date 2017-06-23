@extends('website.partials.master')

@section('title' , 'بيانات الموظفين')

@section('content')

    @include('website.partials.navbar' , ['all_employees_active' => true])

    <div class="container-fluid">

        <div class="clearfix"></div>

        @include('website.partials.success')

        <div class="tag">
            <p>بيانات الموظفين</p>
        </div>

        @if ($user->authority('admin'))

            <a class="btn btn-primary" href="{{ route('create_employee') }}">
                <span class="glyphicon glyphicon-user"></span>
                أضافة موظف جديد
            </a>

        @endif

        <a class="btn btn-info" href="{{ route('resigns') }}">
            <span class="glyphicon glyphicon-off"></span>
            الاستقالات
        </a>

        <a class="btn btn-warning" href="{{ route('waiting_list') }}">
            <span class="glyphicon glyphicon-list"></span>
قائمة الأنتظار
        </a>

        @if($user->authority('admin'))

            <a class="btn btn-danger" href="{{ route('terminations') }}">
                <span class="glyphicon glyphicon-eject"></span>
أنهاء التعاقد
            </a>

            <a class="btn btn-success" href="{{ route('excel_extract' , 'employee') }}">
                <span class="glyphicon glyphicon-file"></span>
    ملف الأكسيل
            </a>

        @endif

        <div class="emptable">

            <table class="table table-bordered table-responsive data" id="employees_table">

                <thead>

                    <tr>

                        <th rowspan="2" class="fixedcol_style">
                            مسلسل
                        </th>
                        <!--                width modulation of the table-->
                        <th rowspan="2" class=" wid-mod fixedcol_style">
                            اسم الموظف كامل (رباعي)
                        </th>
                        <th rowspan="2" >
                            كود الموظف
                        </th>
                        <th rowspan="2" >
                            المكتب
                        </th>
                        <th rowspan="2" class=" wid-mod">
                            الوظيفة
                        </th>
                        <th rowspan="2" class="wid-mod">
                            المشروع التابع له
                        </th>

                        @if ($user->authority('admin') || $user->authority('reader'))

                            <th rowspan="2" >
                                الراتب الشهري
                            </th>
                            <th rowspan="2" >
الدرجة الوظيفية
                            </th>

                        @endif

                        <th rowspan="2" >
                            الجنس
                        </th>
                        <th rowspan="2" >
                            الديانة
                        </th>
                        <th rowspan="2" class=" wid-mod detailed_address">
                            العنوان تفصيليا (شارع - حي - مدينة - محافظة)
                        </th>
                        <th rowspan="2" >
                            رقم المحمول الحالي (الشركة)
                        </th>
                        <th rowspan="2" >
                            رقم تليفون الطوارئ
                        </th>

                        <th rowspan="2" >
                            رقم تليفون المنزل
                        </th>
                        <th rowspan="2" class=" wid-mod">
                            اسم شخص يمكن الاتصال به في الطوارئ
                        </th>
                        <th rowspan="2" >
                            صلة القرابة او المعرفة
                        </th>
                        <th rowspan="2" >
                            رقم تليفونه
                        </th>
                        <th rowspan="2" >
                            تاريخ استلام العمل
                        </th>
                        <th rowspan="2" >
                            "تاريخ التعيين
                            تاريخ توقيع العقد"
                        </th>
                        <th rowspan="2" class=" wid-mod">
                            المؤهل الحاصل عليه
                        </th>
                        <th rowspan="2" >
                            تاريخ الحصول عليه
                        </th>
                        <th rowspan="2" >
                            الموقف من التجنيد
                        </th>
                        <th rowspan="2" >
                            رقم البطاقة (14 رقم)
                        </th>
                        <th rowspan="2" >
                            شخصية / عائلية
                        </th>
                        <th rowspan="2" >
                            تاريخ انتهائها
                        </th>
                        <th rowspan="2" >
                            الحالة الاجتماعية
                        </th>
                        <th rowspan="2" >
                            عدد الاولاد
                        </th>
                        <th rowspan="2" >
                            تاريخ الميلاد
                        </th>
                        <th rowspan="2" class=" wid-mod">
                            الايميل (e-mail address)
                        </th>

                        @if (
                            $user->authority('admin') ||
                            $user->authority('reader') ||
                            $user->canEdit('insurance')
                        )

                            <th rowspan="2" >
                                رقم كارت التامين الصحي
                            </th>
                            <th rowspan="2" >
                                رقم حساب البنك
                            </th>
                            <th rowspan="2" class="insurance">
                                تاريخ بدء الاشتراك التاميني
                            </th>
                            <th rowspan="2" class="insurance">
                                الرقم التامينى
                            </th>
                            <th rowspan="2" class="insurance">
                                المرتب الاساسى التاميني
                            </th>
                            <th rowspan="2" class="insurance">
                                المرتب المتغير التاميني
                            </th>
                            <th rowspan="2" class="insurance">
                                إجمالي الراتب التاميني
                            </th>
                            <th rowspan="2" class="insurance">
                                نسبة الشركة من الاساسي
                            </th>
                            <th rowspan="2" class=" insurance">
                                نسبة الموظف من الاساسي
                            </th>
                            <th rowspan="2" class=" insurance">
                                نسبة الشركة من المتغير
                            </th>
                            <th rowspan="2" class=" insurance">
                                نسبة الموظف من المتغير
                            </th>
                            <th rowspan="2" class=" insurance">
                                إجمالي تحمل الشركة
                            </th>
                            <th rowspan="2" class=" insurance">
                                إجمالي تحمل الموظف
                            </th>
                            @if ($user->canEdit('insurance'))
                                <th></th>
                            @endif

                        @endif

                        @if ($user->authority('admin') || $user->authority('reader'))

                            <th rowspan="2" >
                                تاريخ الاستقالة
                            </th>
                            <th rowspan="2" >
                                تاريخ استمارة 6
                            </th>
                            <th rowspan="2" >
                                رقم استمارة 6
                            </th>
                            <th rowspan="2" >
                                نموذج 111
                            </th>
                            <th rowspan="2" >
                                رقم بطاقة التامين الصحي الحكومي
                            </th>
                            <th rowspan="2" >
                                ملحوظات تامينية
                            </th>

                        @endif


                        @if ($user->authority('admin') || $user->authority('reader') || $user->canEdit('employee-images'))

                            <th colspan="8" style="background-color: brown; color: yellow; font-size: 1.2em; font-weight: bold">
                                مصوغات التعيين
                            </th>

                        @endif

                        @if (
                            $user->authority('admin') ||
                            $user->abilities ||
                            $user->authority('reader')
                        )

                            <th rowspan="2">
                                التفاصيل
                            </th>

                        @endif


                        @if (
                            $user->authority('admin') ||
                            $user->abilities
                        )

                            <th rowspan="2">
                                تعديل
                            </th>

                        @endif

                        @if ($user->authority('admin'))

                            <th rowspan="2">
                                حذف
                            </th>

                        @endif

                    </tr>

                    @if ($user->canEdit('insurance'))

                        <tr>
                            @if ($user->canEdit('insurance'))
                                <th></th>
                            @endif
                        </tr>

                    @endif

                    @if (
                        $user->authority('admin') ||
                        $user->authority('reader') ||
                        $user->canEdit('employee-images')
                    )

                        <tr>
                            <th class="papers">
                                شهادة ميلاد
                            </th>
                            <th class="papers">
                                شهادة الجيش
                            </th>
                            <th class="papers">
                                اصل المؤهل
                            </th>
                            <th class="papers">
                                صورة البطاقة
                            </th>
                            <th class="papers">
    صورة شخصية
                            </th>
                            <th class="papers">
                                فيش جنائى
                            </th>
                            <th class="papers">
                                قرار تعيين
                            </th>
                            <th class="papers">
                                طابعة تامينية
                            </th>

                        </tr>

                        @endif


                </thead>

                @if (count($employees) > 0)

                    <?php $counter = 1 ?>

                    <tbody>

                        @foreach($employees as $employee)

                            <tr>

                                <td class="fixedcol_style">{{ $counter++}}</td>
                                <td class="fixedcol_style">{{ $employee->name }}</td>
                                <td>{{ $employee->code }}</td>
                                <td>{{ $employee->office }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->related_project }}</td>

                                @if ($user->authority('admin') || $user->authority('reader'))

                                    <td>{{ $employee->salary }}</td>
                                    <td>{{ $employee->grade }}</td>

                                @endif

                                    <td>{{ $employee->sex }}</td>
                                    <td>{{ $employee->religion }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->company_mobile }}</td>
                                    <td>{{ $employee->personal_mobile }}</td>
                                    <td>{{ $employee->home_phone }}</td>
                                    <td>{{ $employee->emergency_contact }}</td>
                                    <td>{{ $employee->emergency_relativity }}</td>
                                    <td>{{ $employee->emergency_phone }}</td>
                                    <td>{{ $employee->join_date }}</td>
                                    <td>{{ $employee->contract_date }}</td>
                                    <td>{{ $employee->qualification }}</td>
                                    <td>{{ $employee->qualification_year }}</td>
                                    <td>{{ $employee->army_status }}</td>
                                    <td>{{ $employee->id_number }}</td>
                                    <td>{{ $employee->id_type }}</td>
                                    <td>{{ $employee->id_end_date }}</td>
                                    <td>{{ $employee->marital_status }}</td>
                                    <td>{{ $employee->number_of_children }}</td>
                                    <td>{{ $employee->birth_date }}</td>
                                    <td>{{ $employee->email }}</td>

                                @if (
                                    $user->authority('admin') ||
                                    $user->authority('reader') ||
                                    $user->canEdit('insurance')
                                    )

                                    <td>{{ $employee->health_insurance_number }}</td>
                                    <td>{{ $employee->bank_account }}</td>
                                    <td>{{ $employee->insurance_join_date }}</td>
                                    <td>{{ $employee->insurance_number }}</td>
                                    <td>{{ $employee->const_insurance_salary }}</td>
                                    <td>{{ $employee->var_insurance_salary }}</td>
                                    <td>{{ $employee->total_insurance_salary }}</td>
                                    <td>{{ $employee->company_percentage_const }}</td>
                                    <td>{{ $employee->employee_percentage_const }}</td>
                                    <td>{{ $employee->company_percentage_var }}</td>
                                    <td>{{ $employee->employee_percentage_var }}</td>
                                    <td>{{ $employee->total_company_compensation }}</td>
                                    <td>{{ $employee->total_employee_compensation }}</td>
                                @if ($user->canEdit('insurance'))
                                    <td></td>
                                @endif

                                @endif

                                @if (
                                    $user->authority('admin') ||
                                    $user->authority('reader')
                                )

                                    <td>{{ $employee->resign_date }}</td>
                                    <td>{{ $employee->form_6_date }}</td>
                                    <td>{{ $employee->form_6_number }}</td>
                                    <td>{{ $employee->form_111 }}</td>
                                    <td>{{ $employee->gov_health_number }}</td>
                                    <td>{{ $employee->insurance_notes }}</td>

                                @endif

                                @if (
                                    $user->authority('admin') ||
                                    $user->authority('reader') ||
                                    $user->canEdit('employee-images')
                                )

                                    <td>
                                        @if($employee->birth_certificate)
                                            <a href="{{ asset('imgs/employees/birth_certificates/' . $employee->birth_certificate) }}">مشاهدة الصورة</a>
                                        @else
                                            لا يوجد شهادة ميلاد
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->army_certificate)
                                            <a href="{{ asset('imgs/employees/army_certificates/' . $employee->army_certificate) }}">مشاهدة الصورة</a>
                                        @else
    لايوجد شهادة جيش
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->qualification_copy)
                                            <a href="{{ asset('imgs/employees/qualification_copys/' . $employee->qualification_copy) }}">مشاهدة الصورة</a>
                                        @else
    لا يوجد أصل مؤهل
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->id_copy)
                                            <a href="{{ asset('imgs/employees/id_copys/' . $employee->id_copy) }}">مشاهدة الصورة</a>
                                        @else
    لا يوجد صورة بطاقة
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->personal_photo)
                                            <a href="{{ asset('imgs/employees/personal_photos/' . $employee->personal_photo) }}">مشاهدة الصورة</a>
                                        @else
                                            لا يوجد
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->criminal_record)
                                            <a href="{{ asset('imgs/employees/criminal_records/' . $employee->criminal_record) }}">مشاهدة الصورة</a>
                                        @else
    لايوجد فيش جنائي
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->employment_decision)
                                            <a href="{{ asset('imgs/employees/employment_decisions/' . $employee->employment_decision) }}">مشاهدة الصورة</a>
                                        @else
    لايوجد قرار تعيين
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->insurance_stamp)
                                            <a href="{{ asset('imgs/employees/insurance_stamps/' . $employee->insurance_stamp) }}">مشاهدة الصورة</a>
                                        @else
    لا يوجد طابعة تأمينية
                                        @endif
                                    </td>

                                @endif

                                @if (
                                    $user->authority('admin') ||
                                    $user->authority('reader') ||
                                    $user->canEdit('employee-images') ||
                                    $user->canEdit('insurance')
                                )

                                    <td><a href="{{ route('single_employee' , [$employee->id]) }}" class="btn btn-info">التفاصيل</a> </td>

                                @endif

                                @if (
                                    $user->authority('admin') ||
                                    $user->canEdit('employee-images') ||
                                    $user->canEdit('insurance')
                                )

                                    <td><a href="{{ route('edit_employee' , [$employee->id]) }}" class="btn btn-success">تعديل</a> </td>

                                @endif

                                @if ($user->authority('admin'))

                                    <td><a href="{{ route('delete_employee' , [$employee->id]) }}" class="btn btn-danger delete-btn">حذف</a> </td>

                                @endif

                            </tr>

                        @endforeach

                    </tbody>

                @endif

                <tfoot>
                    <tr>

                        <td class="fixedcol_style wid-mod"></td>
                        <td class="fixedcol_style"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        @if($user->authority('admin') || $user->authority('reader') )
                            <td></td>
                            <td></td>
                        @endif

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        @if(
                            $user->authority('admin') ||
                            $user->authority('reader') ||
                            $user->canEdit('insurance')
                        )
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @if($user->canEdit('insurance'))
                            <td></td>
                        @endif
                            <td></td>
                            <td></td>

                        @endif

                        @if($user->authority('admin') || $user->authority('reader'))
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif

                        @if (
                            $user->authority('admin') ||
                            $user->authority('reader') ||
                            $user->canEdit('employee-images')
                        )
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif

                        @if (
                               $user->authority('admin') ||
                               $user->authority('reader') ||
                               $user->canEdit('employee-images') ||
                               $user->canEdit('insurance')
                               )
                            <td></td>
                        @endif

                        @if (
                               $user->authority('admin') ||
                               $user->canEdit('employee-images') ||
                               $user->canEdit('insurance')
                                )
                            <td></td>
                        @endif

                        @if($user->authority('admin'))
                            <td></td>
                        @endif

                    </tr>
                </tfoot>

            </table>

        </div>

    </div>


    <script>
        $(document).ready(function() {
            $("body").addClass("data_page");
                var table = $('#employees_table').DataTable({
                responsive: true,
                scrollY:        "500px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns: {
                    leftColumns: 2,
                    rightColumns: 0
                },
                "iDisplayLength": 25,
                "oLanguage": {
                    "sLengthMenu": "اعرض _MENU_                  ",
                    "sZeroRecords": "لم يتم العثور علي اي نتائج",
                    "sInfoEmpty": "لم يتم العثور علي اي نتائج       ",
                    "sInfoFiltered": "تصفية من (_MAX_) ناتج",
                    "sInfo": "عددهم (_TOTAL_) ناتج",
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
            @if($user->canEdit('insurance'))
                $('.DTFC_LeftHeadWrapper table thead tr th:first-child').css({"padding" : "27px 18px"});
            @endif
            }

        );
    </script>


@endsection

