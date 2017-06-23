@if(session()->has('success'))

    <div class="container">

        <div class="alert alert-success">
            <h3>{{ session()->pull('success') }}</h3>
        </div>

    </div>

@endif