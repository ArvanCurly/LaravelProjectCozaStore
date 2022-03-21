@extends('backend.templato')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'une catgéorie</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="field">
                        <label class="label">Nom de la catégorie</label>
                        <div class="control">
                            <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $category->name) }}" placeholder="Nom de la catégorie">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
