@extends('website.partials.master')

@section('content')

    <div class="container">
        <img class="bc_center" src="{{ asset('imgs/logo.png') }}" alt="logo">
        <div class="row">

            @if (
                $user->authority('admin') ||
                $user->authority('reader') ||
                $user->canEdit('employee-images') ||
                $user->canEdit('insurance')
            )

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="butnav" id="employees">
                        <div class="pcenter">
                            <a href="{{ route('all_employees') }}">
                                بيانات الموظفين
                            </a>
                        </div>
                    </div>
                </div>

            @endif

            @if (
                $user->authority('admin') ||
                $user->authority('reader') ||
                $user->canEdit('cars')
            )

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="butnav" id="cars">
                        <div class="pcenter">
                            <a href="{{ route('all_cars') }}">
                                رخص و بطاقات السائقين و السيارات
                            </a>
                        </div>
                    </div>
                </div>

            @endif

            @if (
                $user->authority('admin') ||
                $user->authority('reader') ||
                $user->canEdit('rentals')
            )

                <div class="clearfix"></div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="butnav" id="rentals">
                        <div class="pcenter">
                            <a href="{{ route('all_rentals') }}">
                                ايجارات المكاتب
                            </a>
                        </div>
                    </div>
                </div>

            @endif

            @if (
                $user->authority('admin') ||
                $user->authority('reader') ||
                $user->canEdit('vacations')
            )

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="butnav" id="vacations">
                        <div class="pcenter">
                            <a href="{{ route('vacations_index') }}">
                                الاجازات
                            </a>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>

    <script>
        $("body").removeClass("data_page").addClass("firstnav");
    </script>

@endsection