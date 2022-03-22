@extends('backend.templato')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un Produit</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('produits.update', $produit->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">Nom du produit</label>
                        <div class="control">
                            <input class="input @error('titre') is-danger @enderror" type="text" name="titre"
                                value="{{ old('titre', $produit->titre) }}" placeholder="Nom du produit">
                        </div>
                        @error('titre')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>




                    <div class="field">
                        <label class="label">Prix</label>
                        <div class="control">
                            <input class="input" type="number" step="any"  name="prix" value="{{ old('prix', $produit->prix) }}">
                        </div>
                        @error('prix')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label">Matière</label>
                        <div class="control">
                            <input class="input @error('material') is-danger @enderror" type="text" name="material" value="{{ old('material', $produit->material) }}" placeholder="Matière">
                        </div>
                        @error('material')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Dimensions</label>
                        <div class="control">
                            <input class="input @error('dimension') is-danger @enderror" type="text" name="dimension" value="{{ old('dimension', $produit->dimension) }}" placeholder="Dimensions (cm)">
                        </div>
                        @error('dimension')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label">Poid</label>
                        <div class="control">
                            <input class="input @error('poid') is-danger @enderror" type="text" name="poid" value="{{ old('poid', $produit->poid) }}" placeholder="Poids">
                        </div>
                        @error('poid')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>











                    <div class="field" style="display:flex;margin-top:20px;justify-content:space-between;">
                        <div class="select is-multiple" >
                            <label class="label">Selectionner une taille ou plusieurs</label>

                            <select name="taille[]" multiple size="3" style="min-width:300px;text-align:center;">


                    {{-- <option value="{{ $category->id }}" {{ in_array($category->id, old('cats') ?: $film->categories->pluck('id')->all()  ) ? 'selected' : '' }}>
                                    {{$category->name }}</option>

                                    selected={{$elefe->genre == "garcon"}}
                                    --}}


                                @foreach($taille as $t)
                                <option value="{{$t}}"  {{ in_array( $t , $produit->taille) ? 'selected' : '' }}>
                                    {{$t}}</option>
                              @endforeach

                            </select>
                          </div>

                          <div class="select is-multiple" >
                            <label class="label">Selectionner une  ou plusieurs couleurs</label>
                            <select name="couleur[]" multiple size="3" style="min-width:300px;">

                                @foreach($couleur as $c)
                                <option value="{{$c}}"  {{ in_array( $c , $produit->couleur) ? 'selected' : '' }} >{{$c}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="select is-multiple">
                            <label class="label">Selectionner une catégorie ou plusieurs</label>
                              <select name="cats[]" multiple size="3" style="min-width:300px;text-align:center;">

                                  @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id,old('cats') ?: $produit->categories->pluck('id')->all()) ? 'selected' : '' }}>{{$category->name }}</option>
                                  @endforeach
                              </select>
                            </div>

                    </div>



                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name="description" placeholder="Description du film">{{ old('description', $produit->description) }}</textarea>
                        </div>
                        @error('description')
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
