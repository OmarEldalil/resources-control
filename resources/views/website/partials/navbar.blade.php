<nav class="navbar navbar-inverse" role="navigation">

    <div class="container-fluid">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#our">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('imgs/logo.png') }}" alt=""></a>
        </div>

        <!--    next div consists of list, form and list     -->

        <div class="collapse navbar-collapse" id="our">

            <ul class="nav navbar-nav">

                    <li class="{{ isset($home_active) ? 'active' : null }}"><a href="{{ route('home')  }}">الصفحة الرئيسية</a></li>

                    @if (
                        $user->authority('admin') ||
                        $user->authority('reader') ||
                        $user->canEdit('employee-images') ||
                        $user->canEdit('insurance')
                    )

                        <li class="{{ isset($all_employees_active) ? 'active' : null }}"><a href="{{ route('all_employees') }}">بيانات الموظفين</a></li>

                    @endif

                    @if (
                        $user->authority('admin') ||
                        $user->authority('reader') ||
                        $user->canEdit('cars')
                    )

                        <li class="{{ isset($all_cars_active) ? 'active' : null }}"><a href="{{ route('all_cars') }}">رخص و بطاقات السائقين و السيارات</a></li>

                    @endif

                    @if(
                       $user->authority('admin') ||
                       $user->authority('reader') ||
                       $user->canEdit('rentals')
                    )

                        <li class="{{ isset($all_rentals_active) ? 'active' : null }}"><a href="{{ route('all_rentals') }}">الايجارات</a></li>

                    @endif

                    @if (
                        $user->authority('admin') ||
                        $user->authority('reader') ||
                        $user->canEdit('vacations')
                    )

                        <li class="{{ isset($vacations_index_active) ? 'active' : null }}"><a href="{{ route('vacations_index')}}">الاجازات</a></li>

                    @endif

                    @if ($user->authority('admin'))

                        <li class="{{ isset($users_active) ? 'active' : null }}"><a href="{{ route('users') }}">الاعضاء</a></li>

                    @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span>{{ ucwords(request()->user()->name) }}</span><span class="glyphicon glyphicon-user" style="padding-right: 5px"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}">تسجيل خروج</a></li>
                    </ul>
                </li>
            </ul>


        </div>

    </div>
</nav>