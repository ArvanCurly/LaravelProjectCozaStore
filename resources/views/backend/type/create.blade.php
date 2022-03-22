@extends('backend.templato')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un type</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="field">
                        <label class="label">Nom du type</label>
                        <div class="control">
                            <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nom du type">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div  style="margin-bottom:20px;">
                        <label class="label"> Selectionner une ou plusieurs images</label>
                            <input name="files[]" type="file" multiple />

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
