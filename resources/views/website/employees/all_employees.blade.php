@extends('website.partials.master')
@section('title' , 'asdasddas الموظفين')
@section('content')
    @include('website.partials.navbar' , ['all_employees_active' => true])

<div class="container-fluid">

    <div class="clearfix"></div>

    <div class="tag">
        <p>بيانات الموظفين</p>
    </div>

    <div id="emptable">

        <table class=" table table-bordered table-responsive data" id="employees_table">

            <thead>

                <tr>
                    <th rowspan="2" class="fixedcol_style wid-mod">
                        مسلسل
                    </th>
                    <!--                width modulation of the table-->
                    <th rowspan="2" class="fixedcol_style">
                        اسم الموظف كامل (رباعي)
                    </th>
                    <th rowspan="2" >
                        كود الموظف
                    </th>
                    <th rowspan="2" >
                        المكتب
                    </th>
                    <th rowspan="2" style="min-width: 300px">
                        الوظيفة
                    </th>
                    <th rowspan="2" >
                        المشروع التابع له
                    </th>
                    <th rowspan="2" >
                        الراتب الشهري
                    </th>
                    <th rowspan="2" >
                        الرتبة
                    </th>
                    <th rowspan="2" >
                        الجنس
                    </th>
                    <th rowspan="2" >
                        الديانة
                    </th>
                    <th rowspan="2" style="min-width: 300px">
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
                    <th rowspan="2" >
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
                    <th rowspan="2" style="min-width: 300px">
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
                    <th rowspan="2" >
                        الايميل (e-mail address)
                    </th>
                    <th rowspan="2" >
                        رقم كارت التامين الصحي
                    </th>
                    <th rowspan="2" >
                        رقم حساب البنك
                    </th>
                    <th rowspan="2" class=" insurance">
                        تاريخ بدء الاشتراك التاميني
                    </th>
                    <th rowspan="2" class=" insurance">
                        الرقم التامينى
                    </th>
                    <th rowspan="2" class=" insurance">
                        المرتب الاساسى التاميني
                    </th>
                    <th rowspan="2" class="insurance">
                        المرتب المتغير التاميني
                    </th>
                    <th rowspan="2" class=" insurance">
                        إجمالي الراتب التاميني
                    </th>
                    <th rowspan="2" class=" insurance">
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
                    <th colspan="8" style="background-color: brown; color: yellow; font-size: 1.2em; font-weight: bold">
                        مصوغات التعيين
                    </th>
                </tr>

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
                        عدد 6 صورة شخصية
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
            </thead>

            <tbody>

                <tr>
                    <td class="fixedcol_style wid-mod" >
                        1
                    </td>
                    <td class="fixedcol_style" >
                        تشس  نميتشس منيتمنى سيمشىسيم نشستنميت
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>

                </tr>

            </tbody>

            <tfoot>
                <tr>
                    <td class="fixedcol_style wid-mod"></td>
                    <td class="fixedcol_style"></td>
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
                rightColumns: 0,
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

    } );
</script>


@endsection

