@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <h4><li>{{ $error }}</li></h4>
            @endforeach
        </ul>
    </div>
@endif