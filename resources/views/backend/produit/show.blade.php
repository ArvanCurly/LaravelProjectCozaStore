@extends('backend.templato')
@section('content')
<div class="card">
<header class="card-header">
<p class="card-header-title">Titre : {{ $produit->titre }}</p>
</header>
<div class="card-content">
<div class="content">
<p>Id : {{ $produit->id }}</p>

<hr>
<p>Catégories :</p>
<ul>
@foreach($produit->categories as $category)
<li>{{ $category->name }}</li>
@endforeach
</ul>
<p>Types : <span>{{$produit->type->name}}</span></p>
<hr>

<p>{{ $produit->description }}</p>
</div>
</div>
</div>
@endsection
