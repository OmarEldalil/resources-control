@extends('website.partials.master')

@section('content')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                <h4>{{ session('status') }}</h4>
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('post_reset_email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <h3>
                    <label for="email" class="col-md-4 control-label">بريدك الألكترونى</label>
                </h3>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <h4>{{ $errors->first('email') }}</h4>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i> أرسال
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
