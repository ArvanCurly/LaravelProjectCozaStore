@extends('backend.templato')
@section('css')
<style>
.card-footer {
justify-content: center;
align-items: center;
padding: 0.5em;
}
</style>
@endsection
@section('content')
    @if(session()->has('info'))

    <div class="notification is-warning">
        <button type="button" class="delete"></button>
        {{ session('info') }}
      </div>
    @endif

    <div class="card">
        <header class="card-header" style="display:flex;flex-direction:row;justify-content:space-between;">
            <p  style="flex:1;"class="card-header-title"><strong>Produits</strong></p>

                <div class="select">
                    <select onchange="window.location.href = this.value" >
                        <option value="{{ route('produits.index') }}" @unless($slug) selected @endunless>Toutes catégories</option>
                        @foreach($categories as $category)
                            <option value="{{ route('produits.category', $category->slug) }}"
                            {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


            <a class="button is-primary ml-3" href="{{ route('produits.create') }}">Créer un Produit</a>

        </header>
        <div class="card-content">
            <div class="content">
                @if(empty($produits))
                <p style="padding:20px;text-align:center;">Aucun produits n'est disponible</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th colspan="3">Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produits as $produit)
                        <tr @if($produit->deleted_at) class="has-background-grey-lighter" @endif>
                                <td>{{ $produit->id }}</td>
                                <td>{{$produit->titre }}</td>
                                <td>
                                    @if($produit->deleted_at)
                                    <form action="{{ route('produits.restore', $produit->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="button is-primary"
                                    type="submit">Restaurer</button>
                                    </form>
                                    @else

                                <a class="button is-success" href="{{route('produits.show', $produit->id) }}">Voir</a>
                                </td>
                                @endif
                                <td>
                                @if($produit->deleted_at)
                                @else

                                <a class="button is-warning" href="{{route('produits.edit', $produit->id) }}">Modifier</a>
                                @endif
                                </td>
                                <td>
                                    <form action="{{ route($produit->deleted_at? 'produits.force.destroy' :
                                        'produits.destroy', $produit->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
    <footer class="card-footer"style="display:flex;justify-content:center;align-item:center;">
        {{ $produits->links() }}
        </footer>
</div>
@endsection
