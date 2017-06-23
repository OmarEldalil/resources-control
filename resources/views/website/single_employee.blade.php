@extends('website.partials.master')

@section('title' , $employee->name)

@section('content')

    @include('website.partials.navbar' , ['all_employees_active' => true])

    <div class="container details-page">

        <table class="table table-responsive table-bordered data indv">

        @if(
            $user->authority('admin') ||
            $user->authority('reader') ||
            $user->canEdit('employee-images') ||
            $user->canEdit('insurance')
        )

            <tr>
                <th>
                    مسلسل
                </th>
                <td>
                    {{ $employee->id }}
                </td>

                <th>
                    اسم الموظف كامل (رباعي)
                </th>
                <td>
                    {{ $employee->name }}
                </td>
            </tr>

            <tr>
                <th>
                    كود الموظف
                </th>
                <td>
                    {{ $employee->code }}
                </td>

                <th>
                    المكتب
                </th>
                <td>
                    {{ $employee->office }}
                </td>
            </tr>

            <tr>
                <th>
                    الوظيفة
                </th>
                <td>
                    {{ $employee->position }}
                </td>

                <th>
                    المشروع التابع له
                </th>
                <td>
                    {{ $employee->related_project }}
                </td>
            </tr>

        @endif

        @if(
            $user->authority('admin')
        )

            <tr>
                <th>
                    الراتب الشهري
                </th>
                <td>
                    {{ $employee->salary }}
                </td>

                <th>
                    الدرجة الوظيفية
                </th>
                <td>
                    {{ $employee->grade }}
                </td>
            </tr>

            @endif

            @if(
                $user->authority('admin') ||
                $user->authority('reader') ||
                $user->canEdit('employee-images') ||
                $user->canEdit('insurance')
            )

            <tr>
                <th>
                    الجنس
                </th>
                <td>
                    {{ $employee->sex }}
                </td>

                <th>
                    الديانة
                </th>
                <td>
                    {{ $employee->religion }}
                </td>
            </tr>

            <tr>
                <th style="width: 300px;">
                    العنوان تفصيليا (شارع - حي - مدينة - محافظة)
                </th>
                <td>
                    {{ $employee->address }}
                </td>

                <th>
                    رقم المحمول الحالي (الشركة)
                </th>
                <td>{{ $employee->company_mobile }}</td>

            </tr>

            <tr>
                <th>
                    رقم تليفون الطوارئ
                </th>
                <td>{{ $employee->personal_mobile }}</td>


                <th>
                    رقم تليفون المنزل
                </th>
                <td>{{ $employee->home_phone }}</td>

            </tr>

            <tr>
                <th>
                    اسم شخص يمكن الاتصال به في الطوارئ
                </th>
                <td>{{ $employee->emergency_contact }}</td>


                <th>
                    صلة القرابة او المعرفة
                </th>
                <td>{{ $employee->emergency_relativity }}</td>

            </tr>

            <tr>
                <th>
                    رقم تليفونه
                </th>
                <td>{{ $employee->emergency_phone }}</td>


                <th>
                    تاريخ استلام العمل
                </th>
                <td>{{ $employee->join_date }}</td>

            </tr>

            <tr>
                <th>
                    "تاريخ التعيين تاريخ توقيع العقد"
                </th>
                <td>{{ $employee->contract_date }}</td>


                <th>
                    المؤهل الحاصل عليه
                </th>
                <td>{{ $employee->qualification }}</td>

            </tr>

            <tr>
                <th>
                    تاريخ الحصول عليه
                </th>
                <td>{{ $employee->qualification_year }}</td>


                <th>
                    الموقف من التجنيد
                </th>
                <td>{{ $employee->army_status }}</td>

            </tr>

            <tr>
                <th>
                    رقم البطاقة (14 رقم)
                </th>
                <td>{{ $employee->id_number }}</td>


                <th>
                    شخصية / عائلية
                </th>
                <td>{{ $employee->id_type }}</td>

            </tr>

            <tr>
                <th>
                    تاريخ انتهائها
                </th>
                <td>{{ $employee->id_end_date }}</td>


                <th>
                    الحالة الاجتماعية
                </th>
                <td>{{ $employee->marital_status }}</td>

            </tr>

            <tr>
                <th>
                    عدد الاولاد
                </th>
                <td>{{ $employee->number_of_children }}</td>


                <th>
                    تاريخ الميلاد
                </th>
                <td>{{ $employee->birth_date }}</td>

            </tr>

            <tr>
                <th>
                    الايميل (e-mail address)
                </th>
                <td>{{ $employee->email }}</td>


        @endif

        @if (
            $user->authority('admin') ||
            $user->authority('reader') ||
            $user->canEdit('insurance')
        )

                <th>
                    رقم كارت التامين الصحي
                </th>
                <td>{{ $employee->health_insurance_number }}</td>

            </tr>

            <tr>
                <th>
                    رقم حساب البنك
                </th>
                <td>{{ $employee->bank_account }}</td>

            </tr>

            <tr>
                <th>
                    تاريخ بدء الاشتراك التاميني
                </th>
                <td>{{ $employee->insurance_join_date }}</td>


                <th>
                    الرقم التامينى
                </th>
                <td>{{ $employee->insurance_number }}</td>

            </tr>

            <tr>
                <th>
                    المرتب الاساسى التاميني
                </th>
                <td>{{ $employee->const_insurance_salary }}</td>


                <th>
                    المرتب المتغير التاميني
                </th>
                <td>{{ $employee->var_insurance_salary }}</td>

            </tr>

            <tr>
                <th>
                    إجمالي الراتب التاميني
                </th>
                <td>{{ $employee->total_insurance_salary }}</td>


                <th>
                    نسبة الشركة من الاساسي
                </th>
                <td>{{ $employee->company_percentage_const }}</td>

            </tr>

            <tr>
                <th>
                    نسبة الموظف من الاساسي
                </th>
                <td>{{ $employee->employee_percentage_const }}</td>


                <th>
                    نسبة الشركة من المتغير
                </th>
                <td>{{ $employee->company_percentage_var }}</td>

            </tr>

            <tr>
                <th>
                    نسبة الموظف من المتغير
                </th>
                <td>{{ $employee->employee_percentage_var }}</td>


                <th>
                    إجمالي تحمل الشركة
                </th>
                <td>{{ $employee->total_company_compensation }}</td>

            </tr>

            <tr>
                <th>
                    إجمالي تحمل الموظف
                </th>
                <td>{{ $employee->total_employee_compensation }}</td>

            </tr>

        @endif

        @if (
            $user->authority('admin') ||
            $user->authority('reader')
        )

            <tr>
                <th>
                    تاريخ الاستقالة
                </th>
                <td>{{ $employee->resign_date }}</td>


                <th>
                    تاريخ استمارة 6
                </th>
                <td>{{ $employee->form_6_date }}</td>

            </tr>

            <tr>
                <th>
                    رقم استمارة 6
                </th>
                <td>{{ $employee->form_6_number }}</td>


                <th>
                    نموذج 111
                </th>
                <td>{{ $employee->form_111 }}</td>

            </tr>

            <tr>
                <th>
                    رقم بطاقة التامين الصحي الحكومي
                </th>
                <td>{{ $employee->gov_health_number }}</td>


                <th>
                    ملحوظات تامينية
                </th>
                <td>{{ $employee->insurance_notes }}</td>

            </tr>
        </table>

        @endif

        @if (
            $user->authority('admin') ||
            $user->authority('reader') ||
            $user->canEdit('employee-images')
        )


            <table class="table table-responsive table-bordered data indv">
                <h1 class="text-center">مصوغات التعين</h1>
                <tr>
                    <th>
                        شهادة ميلاد
                    </th>
                    <td>
                        @if($employee->birth_certificate)
                            <a href="{{ asset('imgs/employees/birth_certificates/' . $employee->birth_certificate) }}">
                                <img src="{{ asset('imgs/employees/birth_certificates/' . $employee->birth_certificate) }}">
                            </a>
                        @else
                            لا يوجد شهادة ميلاد
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>
                        شهادة الجيش
                    </th>
                    <td>
                        @if($employee->army_certificate)
                            <a href="{{ asset('imgs/employees/army_certificates/' . $employee->army_certificate) }}">
                                <img src="{{ asset('imgs/employees/army_certificates/' . $employee->army_certificate) }}">
                            </a>
                        @else
                            لايوجد شهادة جيش
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>
                        اصل المؤهل
                    </th>
                    <td>
                        @if($employee->qualification_copy)
                            <a href="{{ asset('imgs/employees/qualification_copys/' . $employee->qualification_copy) }}">
                                <img src="{{ asset('imgs/employees/qualification_copys/' . $employee->qualification_copy) }}">
                            </a>
                        @else
                            لا يوجد أصل مؤهل
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>
                        صورة البطاقة
                    </th>
                    <td>
                        @if($employee->id_copy)
                            <a href="{{ asset('imgs/employees/id_copys/' . $employee->id_copy) }}">
                                <img src="{{ asset('imgs/employees/id_copys/' . $employee->id_copy) }}">
                            </a>
                        @else
                            لا يوجد صورة بطاقة
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>
                        صورة شخصية
                    </th>
                    <td>
                        @if($employee->personal_photo)
                            <a href="{{ asset('imgs/employees/personal_photos/' . $employee->personal_photo) }}">
                                <img src="{{ asset('imgs/employees/personal_photos/' . $employee->personal_photo) }}">
                            </a>
                        @else
                            لايوجد
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>
                        فيش جنائى
                    </th>
                    <td>
                        @if($employee->criminal_record)
                            <a href="{{ asset('imgs/employees/criminal_records/' . $employee->criminal_record) }}">
                                <img src="{{ asset('imgs/employees/criminal_records/' . $employee->criminal_record) }}">
                            </a>
                        @else
                            لايوجد فيش جنائي
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>
                        قرار تعيين
                    </th>
                    <td>
                        @if($employee->employment_decision)
                            <a href="{{ asset('imgs/employees/employment_decisions/' . $employee->employment_decision) }}">
                                <img src="{{ asset('imgs/employees/employment_decisions/' . $employee->employment_decision) }}">
                            </a>
                        @else
                            لايوجد قرار تعيين
                        @endif
                    </td>
                </tr>

                <tr>

                    <th>
                        طابعة تامينية
                    </th>
                    <td>
                        @if($employee->insurance_stamp)
                            <a href="{{ asset('imgs/employees/insurance_stamps/' . $employee->insurance_stamp) }}">
                                <img src="{{ asset('imgs/employees/insurance_stamps/' . $employee->insurance_stamp) }}">
                            </a>
                        @else
                            لا يوجد طابعة تأمينية
                        @endif
                    </td>
                </tr>
            </table>

        @endif

    </div>

@endsection