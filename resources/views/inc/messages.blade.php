@if($errors->any())
    @foreach($errors->any() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
@endif
