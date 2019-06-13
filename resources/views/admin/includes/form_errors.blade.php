@if(!$errors->isEmpty())
    <div>
        <div>
            <strong>Something went wrong..</strong>
        </div>

        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)                
                    {{ $error }}<br>            
            @endforeach
        </div>
    </div>
@endif