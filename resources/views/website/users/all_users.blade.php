@extends('website.partials.master')

@section('title' , 'الأعضاء')

@section('content')

    @include('website.partials.navbar' , ['users_active' => true])

    <div class="container-fluid">

        @include('website.partials.success')

        <a href="{{ route('create_user') }}" class="btn btn-primary">
            أضافة عضو جديد
        </a>

        <table class="table table-bordered table-responsive vac" id="members_table">
            <thead>
                <tr>
                    <th >مسلسل</th>
                    <th>الاسم</th>
                    <th>الكود</th>
                    <th>الايميل</th>
                    <th>الصلاحية</th>
                    <th>المميزات</th>
                    <th>الحالة</th>
                </tr>
            </thead>
            <tbody>

                @if (count($users))

                    <?php $counter = 1; ?>

                    @foreach($users as $userData)

                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $userData->name }}</td>
                            <td>{{ $userData->code }}</td>
                            <td>{{ $userData->email }}</td>
                            <td>{{ $userData->authority ? $userData->authority : 'لا يوجد' }}</td>
                            <td>{{ $userData->abilities() ? $userData->abilities() : 'لا يوجد' }}</td>
                            <td>
                                <a href="{{ route('edit_user' , $userData->id)  }}" class="btn-success btn-cir">تعديل</a>
                                <a href="{{ route('delete_user' , $userData->id) }}" class="btn-danger btn-cir delete-btn">حذف</a>
                            </td>
                        </tr>

                    @endforeach

                @endif

            </tbody>
            <tfoot>
            <tr>
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

    <script>
        $("body").addClass("data_page");
        var table=$("#members_table").dataTable({
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
                    var select = $('<select class="form-control"><option value=""></option></select>')
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