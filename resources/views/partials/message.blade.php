@if($errors->count())
    <div class="alert alert-danger">
        test
        @foreach($errors->all() as $error) {
            {{ $error }}
        @endforeach
    </div>
@endif
