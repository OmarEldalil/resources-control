<table class="table">
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('city' , 'المحافظة') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('city' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('address' , 'العنوان تفصيلا : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('address' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('description' , 'الوصف : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('description' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('owner' , 'المالك : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('owner' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('renter' , 'المؤجر : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('renter' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('contract_start_date' , 'بداية التعاقد : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::date('contract_start_date' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('contract_end_date' , 'نهاية التعاقد : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::date('contract_end_date' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('rental_cost' , 'القيمة الايجارية الشهرية : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('rental_cost' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('payment_method' , 'طريقة السداد : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('payment_method' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
    <tr>
        <th class="label-table">
            <h4>{{ Form::label('insurance' , 'التأمين : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('insurance' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('annual_raise' , 'الزياده السنويه : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('annual_raise' , null , ['class' => 'form-control']) }}
        </td>
        <th class="label-table">
            <h4>{{ Form::label('notes' , 'ملاحظات : ') }}</h4>
        </th>
        <td class="input-table-col">
            {{ Form::text('notes' , null , ['class' => 'form-control']) }}
        </td>
    </tr>
</table>

@if (isset($rental))

    @if (count( $images = $rental->images ))

        @foreach($images as $image)

            <img style="max-width: 500px" src="{{ asset('imgs/rentals/' . $image->image_name) }}">

            <br>
            <br>

            <a class="delete-btn btn btn-danger" href="{{ route('delete_rental_image' , [$image->id]) }}">حذف</a>

            <br>
            <br>

        @endforeach

    @endif

@endif

<div class="form-group">
    <h4>{{ Form::label('rental_images' , 'نسخ الأيجار : ') }}</h4>
    {{ Form::file('rental_images[]' , ['class' => 'form-control' , 'multiple' => true]) }}
</div>

