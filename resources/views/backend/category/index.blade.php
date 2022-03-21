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
            <p  style="flex:1;"class="card-header-title"><strong>categories</strong></p>

            <a class="button is-primary ml-3" href="{{ route('categories.create') }}">Créer un category</a>

        </header>
        <div class="card-content">
            <div class="content">
                @if(empty($categories))
                <p style="padding:20px;text-align:center;">Aucun categories n'est disponible</p>
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

                        @foreach ($categories as $category)
                        <tr @if($category->deleted_at) class="has-background-grey-lighter" @endif>
                                <td>{{ $category->id }}</td>
                                <td>{{$category->name }}</td>
                                <td>
                                    @if($category->deleted_at)
                                    <form action="{{ route('categories.restore', $category->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="button is-primary"
                                    type="submit">Restaurer</button>
                                    </form>
                                    @else

                                <a class="button is-success" href="{{route('categories.show', $category->id) }}">Voir</a>
                                </td>
                                @endif
                                <td>
                                @if($category->deleted_at)
                                @else

                                <a class="button is-warning" href="{{route('categories.edit', $category->id) }}">Modifier</a>
                                @endif
                                </td>
                                <td>
                                    <form action="{{ route($category->deleted_at? 'categories.force.destroy' :
                                        'categories.destroy', $category->id) }}" method="post">
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
        {{ $categories->links() }}
        </footer>
</div>
@endsection
