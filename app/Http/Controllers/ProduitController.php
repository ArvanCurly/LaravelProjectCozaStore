<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Produit as ProduitRequest;
use App\Models\Type;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {

        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->produits() : Produit::query();
        $produits = $query->withTrashed()->oldest('titre')->paginate(5);


    return view('backend.produit.index', compact('produits','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $taille = array('xS','S','M','L','XL','XXL');
        $couleur = array('red','green','white','black','blue','orange','purple');

        return view('backend.produit.create',compact('taille','couleur','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {

        //Produit::create($request->all());

        $this->validate($request ,[
            'file' => 'image|mimes:jpeg,png,jpg',
        ]);

        $produit = new Produit();

        if($request->hasFile('files')){

           $imageNames = [];

           foreach($request->file('files') as $file){

               $imageName = $request->name.'-image-'.time().rand(1,1000).'.'.$file->extension();
               $file->move(public_path('upload_produit_img'), $imageName);
               array_push($imageNames,$imageName);
           }
                $produit->image = $imageNames;
        }

        $produit->titre = $request->titre;
        $produit->prix = $request->prix;
        $produit->material = $request->material;
        $produit->dimension = $request->dimension;
        $produit->poid = $request->poid;
        $produit->description = $request->description;

        $produit->taille = $request->taille;
        $produit->couleur = $request->couleur;
        $produit->type_id = $request->type_id;

        $produit->save();

        $produit->categories()->attach($request->cats);


    return redirect()->route('produits.index')->with('info', 'Le produit a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  Produit $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $produit->with('categories')->get();
        return view('backend.produit.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $taille = array('xS','S','M','L','XL','XXL');
        $couleur = array('red','green','white','black','blue','orange','purple');

        return view('backend.produit.edit', compact('produit','taille','couleur'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitRequest $request, Produit $produit)
    {
        $produit->update($request->all());
        $produit->categories()->sync($request->cats);
        return redirect()->route('produits.index')->with('info', 'Le produit a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
return back()->with('info', 'Le produit a bien été mis dans la corbeille.');
    }

    public function forceDestroy($id)
{
    Produit::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
    return back()->with('info', 'Le produit a bien été supprimé définitivement dans la base de données.');
}

public function restore($id)
    {
        Produit::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le produit a bien été restauré.');
    }

}
