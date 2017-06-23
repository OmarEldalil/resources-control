@if ($status == 'موافقة')

    <h1>
    تم قبول طلب الأجازة للموظف
    <span style="color: #3EB2D4;">{{ $employee['name'] }}</span>
    </h1>

    <h3>
    وتبدأ من :
        <span style="color: #3EB2D4;">{{ $start_date }}</span>
    </h3>

    <h3>
    وتنتهى فى :
        <span style="color: #3EB2D4;">{{ $end_date }}</span>
    </h3>

    <h3>
        وذلك لمدة :
        <span style="color: #3EB2D4">{{ $vacation_duration }}</span>
        يوم
    </h3>

@elseif($status == 'رفض')

    <h1>
    تم رفض طلب الأجازة للموظف
    <span style="color: #3EB2D4">{{ $employee['name'] }}</span>
    </h1>
    <h3>
        المحدد من :
        <span style="color: #3EB2D4;">{{ $start_date }}</span>
    </h3>

@endif
