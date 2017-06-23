<h1>
    طلب أجازة للموظف :
    <span style="color: #3EB2D4">{{ $employee['name'] }}</span>
    الكود :
    <span style="color: #3EB2D4">{{ $employee_code }}</span>
</h1>
<h2>
    وذلك لمدة :
    <span style="color: #3EB2D4">{{ $vacation_duration }}</span>
</h2>
<h2>
    تبتدى من :
    <span style="color: #3EB2D4">{{ $start_date }}</span>
    وتنتهى فى
    <span style="color: #3EB2D4">{{ $end_date }}</span>
</h2>

<h3>
    <a href="{{ route('vacations_requests') }}">الذهاب الى طلبات الأجازات</a>
</h3>
