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
            <p  style="flex:1;"class="card-header-title"><strong>types</strong></p>

            <a class="button is-primary ml-3" href="{{ route('types.create') }}">Créer un type</a>

        </header>
        <div class="card-content">
            <div class="content">
                @if(empty($types))
                <p style="padding:20px;text-align:center;">Aucun types n'est disponible</p>
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

                        @foreach ($types as $type)
                        <tr @if($type->deleted_at) class="has-background-grey-lighter" @endif>
                                <td>{{ $type->id }}</td>
                                <td>{{$type->name }}</td>
                                <td>
                                    @if($type->deleted_at)
                                    <form action="{{ route('types.restore', $type->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="button is-primary"
                                    type="submit">Restaurer</button>
                                    </form>
                                    @else

                                <a class="button is-success" href="{{route('types.show', $type->id) }}">Voir</a>
                                </td>
                                @endif
                                <td>
                                @if($type->deleted_at)
                                @else

                                <a class="button is-warning" href="{{route('types.edit', $type->id) }}">Modifier</a>
                                @endif
                                </td>
                                <td>
                                    <form action="{{ route($type->deleted_at? 'types.force.destroy' :
                                        'types.destroy', $type->id) }}" method="post">
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
        {{ $types->links() }}
        </footer>
</div>
@endsection
