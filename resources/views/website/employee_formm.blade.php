@if ($user->authority('admin'))

    <table class="table">
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('name' , 'اسم الموظف : ') }}</h4>
            </th>
            <td class="input-table-col">
                {{ Form::text('name' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('code' , 'كود الموظف : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('code' , (isset($employees)) ? $employees->last()->code + 1 : null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('office' , 'المكتب : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('office' , null , ['class' => 'form-control']) }}
            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('position' , 'الوظيفة : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('position' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('related_project' , 'المشروع التابع له : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('related_project' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('salary' , 'الراتب الشهرى : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('salary' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('grade' , 'Grade : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('grade' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('sex' , 'الجنس : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::select('sex' , ['ذكر' => 'ذكر' , 'انثى' => 'انثى'] , 'ذكر' , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('religion' , 'الديانة : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::select('religion' , ['مسلم' => 'مسلم' , 'مسيحى' => 'مسيحى'] , 'مسلم' , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('address' , 'العنوان تفصيليا (شارع - حي - مدينة - محافظة) : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('address' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('company_mobile' , 'رقم المحمول الحالي (الشركة) : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('company_mobile' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('personal_mobile' , 'رقم تليفون الطوارئ : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('personal_mobile' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('home_phone' , 'رقم تليفون المنزل : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('home_phone' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('emergency_contact' , 'اسم شخص يمكن الاتصال به في الطوارئ : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('emergency_contact' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('emergency_relativity' , 'صلة القرابة او المعرفة : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('emergency_relativity' , null , ['class' => 'form-control']) }}
            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('emergency_phone' , 'رقم تليفونه : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('emergency_phone' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('join_date' , 'تاريخ استلام العمل : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('join_date' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('vacation_type' , 'نوع الأجازة :  ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::select('vacation_type' , [30 => 30 , 21 => 21] , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('contract_date' , 'تاريخ توقيع العقد : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('contract_date' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('qualification' , 'المؤهل الحاصل عليه : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('qualification' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('qualification_year' , 'تاريخ الحصول عليه : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('qualification_year' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('army_status' , 'الموقف من التجنيد : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::select('army_status' , ['أدى الخدمة'=> 'أدى الخدمة' , 'أعفاء نهائى'=> 'أعفاء نهائى' ,'لم يتحدد بعد' => 'لم يتحدد بعد','مؤجل'=> 'مؤجل'] , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('id_number' , 'رقم البطاقة (14 رقم) : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('id_number' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('id_type' , 'شخصية / عائلية : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::select('id_type' , ['شخصية' => 'شخصية' , 'عائلية' => 'عائلية'] , old('id_type') , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('id_end_date' , 'تاريخ انتهائها : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('id_end_date' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('marital_status' , 'الحالة الاجتماعية : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::select('marital_status' , ['أعزب'  => 'أعزب' , 'متزوج' => 'متزوج' , 'متزوج و يعول' => 'متزوج ويعول'] , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('number_of_children' , 'عدد الاولاد :') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('number_of_children' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('birth_date' , 'تاريخ الميلاد :  ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('birth_date' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('email' , '..E.mail Address : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::email('email' , null , ['class' => 'form-control']) }}

            </td>
        </tr>

        <tr>
            <th class="label-table emp-label-edit">

            </th>
            <td class="input-table-col">

            </td>
            <th class="label-table emp-label-edit">

            </th>
            <td class="input-table-col">

            </td>
            <th class="label-table emp-label-edit">

            </th>
            <td class="input-table-col">

            </td>
        </tr>
    </table>

@endif

@if ($user->authority('admin') || $user->canEdit('insurance'))

    <table class="table">
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('health_insurance_number' , 'رقم كارت التامين الصحي : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('health_insurance_number' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('bank_account' , 'رقم حساب البنك : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('bank_account' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('insurance_join_date' , 'تاريخ بدء الاشتراك التاميني : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('insurance_join_date' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('insurance_number' , 'الرقم التامينى : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('insurance_number' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('const_insurance_salary' , 'المرتب الاساسى التاميني : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('const_insurance_salary' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('var_insurance_salary' , 'المرتب المتغير التاميني : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('var_insurance_salary' , null , ['class' => 'form-control']) }}

            </td>
        </tr>

    </table>


@endif

@if ($user->authority('admin'))

    <table class="table">
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('resign_date' , 'تاريخ الاستقالة : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('resign_date' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('form_6_date' , 'تاريخ استمارة 6 : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::date('form_6_date' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('form_6_number' , 'رقم استمارة 6 : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::number('form_6_number' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
        <tr>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('form_111' , 'نموذج 111 : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('form_111' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('gov_health_number' , 'رقم بطاقة التامين الصحي الحكومي : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('gov_health_number' , null , ['class' => 'form-control']) }}

            </td>
            <th class="label-table emp-label-edit">
                <h4>{{ Form::label('insurance_notes' , 'ملحوظات تامينية : ') }}</h4>

            </th>
            <td class="input-table-col">
                {{ Form::text('insurance_notes' , null , ['class' => 'form-control']) }}

            </td>
        </tr>
    </table>


@endif

@if ($user->authority('admin') || $user->canEdit('employee-images'))

    @if (isset($employee))

    <br>

        @foreach($employeeImageInputs as $employeeImageInput)

            @if ($imageName =  $employee->$employeeImageInput)

                <h4>{{ trans('employee_image_inputs.' . $employeeImageInput) }}</h4>

                <img style="max-width: 400px;" src="{{ asset('imgs/employees/' . $employeeImageInput . 's/' . $imageName) }}">

                <p>
                    <a class="btn btn-danger delete-btn" href="{{ route('delete_employee_image' , [$employee->id , $employeeImageInput]) }}">حذف</a>
                </p>

            @else

                <div class="form-group">
                    <h4>{{ Form::label($employeeImageInput , trans('employee_image_inputs.' . $employeeImageInput)) }}</h4>
                    {{ Form::file($employeeImageInput ,  ['class' => 'form-control']) }}
                </div>

            @endif

        @endforeach

    @else

        <table class="table">
            <tr>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('birth_certificate' , 'شهادة ميلاد : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('birth_certificate' , ['class' => 'form-control']) }}

                </td>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('army_certificate' , 'شهادة الجيش  :  ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('army_certificate' , ['class' => 'form-control']) }}

                </td>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('qualification_copy' , 'اصل المؤهل : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('qualification_copy' , ['class' => 'form-control']) }}

                </td>
            </tr>
            <tr>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('personal_photo' , 'صورة شخصية : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('personal_photo' , ['class' => 'form-control' , 'multiple' => true]) }}

                </td>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('id_copy' , 'صورة البطاقة : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('id_copy' , ['class' => 'form-control']) }}

                </td>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('criminal_record' , 'فيش جنائى : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('criminal_record' , ['class' => 'form-control']) }}

                </td>
            </tr>
            <tr>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('employment_decision' , 'قرار تعيين : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('employment_decision' , ['class' => 'form-control']) }}

                </td>
                <th class="label-table emp-label-edit">
                    <h4>{{ Form::label('insurance_stamp' , 'طابعة تأمينية : ') }}</h4>

                </th>
                <td class="input-table-col">
                    {{ Form::file('insurance_stamp' , ['class' => 'form-control']) }}

                </td>
            </tr>
        </table>

    @endif

@endif

