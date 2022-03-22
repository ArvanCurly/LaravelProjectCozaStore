<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->getSession()->has('name')){

            $categories = Category::withTrashed()->oldest('name')->paginate(5);

            return view('backend.category.index', compact('categories'));
        }else {
            return redirect()->route('register');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Category::create($request->all());

         $this->validate($request ,[
             'file' => 'image|mimes:jpeg,png,jpg',
         ]);

         $category = new Category();

         if($request->hasFile('files')){

            $imageNames = [];

            foreach($request->file('files') as $file){

                $imageName = $request->name.'-image-'.time().rand(1,1000).'.'.$file->extension();
                $file->move(public_path('upload_category_img'), $imageName);
                array_push($imageNames,$imageName);
            }
             $category->image = $imageNames;
         }


         $category->name = $request->name;
         $category->slug = $request->name;

         $category->save();


         return redirect()->route('categories.index')->with('info', 'La categorie a bien été créé');

    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('info', 'La catégorie a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('info', 'La catégorie a bien été mis dans la corbeille.');
    }

public function forceDestroy($id)
{
    Category::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
    return back()->with('info', 'La catégorie a bien été supprimé définitivement dans la base de données.');
}

public function restore($id)
    {
        Category::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'La catégorie a bien été restauré.');
    }
}
