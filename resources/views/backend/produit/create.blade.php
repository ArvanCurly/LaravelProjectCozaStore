@extends('backend.templato')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un Produit</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="field">
                        <label class="label">Titre</label>
                        <div class="control">
                            <input class="input @error('titre') is-danger @enderror" type="text" name="titre" value="{{ old('titre') }}" placeholder="Nom du Produit">
                        </div>
                        @error('titre')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Type de produit</label>
                        <div class="select">
                            <select name="type_id">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->slug }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="field">
                        <label class="label">Prix</label>
                        <div class="control">
                            <input class="input" type="number" step="any"  name="prix" value="{{ old('prix') }}">
                        </div>
                        @error('prix')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label">Matière</label>
                        <div class="control">
                            <input class="input @error('material') is-danger @enderror" type="text" name="material" value="{{ old('material') }}" placeholder="Matière">
                        </div>
                        @error('material')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Dimensions</label>
                        <div class="control">
                            <input class="input @error('dimension') is-danger @enderror" type="text" name="dimension" value="{{ old('dimension') }}" placeholder="Dimensions (cm)">
                        </div>
                        @error('dimension')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label">Poid</label>
                        <div class="control">
                            <input class="input @error('poid') is-danger @enderror" type="text" name="poid" value="{{ old('poid') }}" placeholder="Poids">
                        </div>
                        @error('poid')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="field" style="display:flex;margin-top:20px;justify-content:space-between;">
                        <div class="select is-multiple" >
                            <label class="label">Selectionner une taille ou plusieurs</label>

                            <select name="taille[]" multiple size="3" style="min-width:300px;text-align:center;">


                                @foreach($taille as $t)
                                <option value="{{$t}}">{{$t}}</option>
                              @endforeach

                            </select>
                          </div>

                          <div class="select is-multiple" >
                            <label class="label">Selectionner une  ou plusieurs couleurs</label>
                            <select name="couleur[]" multiple size="3" style="min-width:300px;">

                                @foreach($couleur as $c)
                                <option value="{{$c}}" >{{$c}}</option>
                              @endforeach
                            </select>
                          </div>


                          <div class="select is-multiple">
                            <label class="label">Selectionner une catégorie ou plusieurs</label>
                              <select name="cats[]" multiple size="3" style="min-width:300px;text-align:center;">

                                  @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{ in_array($category->id, old('cats') ?: []) ? 'selected' : '' }}>{{ $category->name }}</option>
                                  @endforeach
                              </select>
                            </div>


                    </div>



                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name="description" placeholder="Description du film">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    {{-- <div class="field">
                        <label class="label">Selectionner une catégorie ou plusieurs</label>
                        <div class="select is-multiple">
                            <select name="cats[]" multiple size="3" style="min-width:300px;text-align:center;">

                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, old('cats') ?: []) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                          </div> --}}
{{--
                    </div> --}}



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
