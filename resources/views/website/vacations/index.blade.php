@extends('website.partials.master')

@section('title' , 'الاجازات')

@section('content')

    @include('website.partials.navbar' , ['vacations_index_active' => true])

    <div class="container">
        <ul class="ad_nav">
            <li>
                <a href="{{ route('vacations_balance') }}">رصيد الاجازات</a>
            </li>
        @if ($user->authority('admin'))
            <li>

                <a href="{{ route('vacations_requests') }}">
                    طلبات الأجازات
                    <span class="badge">{{ $vacationRequests->count() }}</span>
                </a>

            </li>
        @endif
        </ul>
    </div>

@endsection