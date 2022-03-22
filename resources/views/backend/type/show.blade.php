@extends('backend.templato')
@section('content')
<div class="card">
    <header class="card-header">
    <p class="card-header-title">Nom de la catégorie : {{ $type->name }}</p>
    </header>
    <div class="card-content">
        <div class="content">
            <p>Id : {{ $type->id }}</p>
            <div>
                <img src="{{asset('upload_type_img').'/'.$type->image['0'] }}" width="350" height="250" />
            </div>

        </div>
    </div>
</div>
@endsection
