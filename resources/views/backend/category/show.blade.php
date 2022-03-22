@extends('backend.templato')
@section('content')
<div class="card">
    <header class="card-header">
    <p class="card-header-title">Nom de la catégorie : {{ $category->name }}</p>
    </header>
    <div class="card-content">
        <div class="content">
            <p>Id : {{ $category->id }}</p>
            <img src="{{asset('upload_category_img').'/'.$category->image['0'] }}" width="350" height="250" />

        </div>
    </div>
</div>
@endsection
