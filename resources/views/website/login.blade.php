@extends('website.partials.master')

@section('content')

    <div class="container">

        <div class="formdiv">

            <div class="welcome_logo">
                <img src="{{ asset('imgs/logo.png') }}" alt="Company Logo">
            </div>

            {{ Form::open(['route' => 'post_login']) }}

                @include('errors.input')
                @include('website.partials.failed')
                @include('website.partials.success')
                @include('website.partials.success')

                <div class="form-group welcome_form_group">

                    <div class="input-group">
                        <input name="email" type="email" class="form-control login" placeholder="البريد الألكترونى" id="email" required>
                        <span class="input-group-addon glyphicon glyphicon-user" style="border-left: 1px solid #cccccc; position: relative;top:0;"></span>
                    </div>

                    <div class="input-group">
                        <input name="password" type="password" class="form-control login" placeholder="كلمة السر" id="password" required>
                        <span class="input-group-addon glyphicon glyphicon-lock" style="border-left: 1px solid #cccccc; position: relative;top:0;"></span>
                    </div>

                    <input type="submit" name="submit" value="تسجيل الدخول"class="subb">

                    <h4>
                        <a href="{{ route('get_reset_email') }}">أستعادة كلمة المرور!</a>
                    </h4>

                </div>

            {{ Form::close() }}

        </div>

    </div>
    <script>
        $("body").removeClass("data_page").addClass("welcomehome");
    </script>
@endsection