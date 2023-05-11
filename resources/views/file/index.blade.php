@extends('layout.main')

@section('content')

    <form action="/zakazunity/import" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="files" class="btn btn-light">
        <input type="submit" class="btn btn-light">
        @error('files')<div class="alert alert-danger" role="alert"> {{ $message }} </div>@enderror

    </form>
     <hr>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">номер заказа</li>
        <li class="list-group-item">дата создания</li>
        <li class="list-group-item">статус</li>
        <li class="list-group-item">комментарий</li>
    </ul>
    @forelse($addList as $item)
            <ul class="list-group list-group-horizontal">
       <li class="list-group-item list-group-item-{{Str::before($item->comment,',')}}">{{ $item->id_zakaz }}</li>
       <li class="list-group-item list-group-item-{{Str::before($item->comment,',')}}">{{ $item->created_at }}</li>
       <li class="list-group-item list-group-item-{{Str::before($item->comment,',')}}">{{ $item->status }}</li>
       <li class="list-group-item list-group-item-{{Str::before($item->comment,',')}}">{{ Str::after($item->comment, ',') }}</li>
            </ul>
    @empty
        <h2>Записей нет</h2>
    @endforelse

    {{ $addList->links() }}
@endsection
