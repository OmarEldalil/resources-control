@if(session()->has('failed'))


        <div class="alert alert-danger">
            <h3>{{ session()->pull('failed') }}</h3>
        </div>


@endif