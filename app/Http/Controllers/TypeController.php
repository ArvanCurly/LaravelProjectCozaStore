<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::withTrashed()->oldest('name')->paginate(5);

        return view('backend.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Type::create($request->all());
        return redirect()->route('types.index')->with('info', 'Le type a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('backend.type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('backend.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return redirect()->route('types.index')->with('info', 'Le type a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return back()->with('info', 'Le type a bien été mis dans la corbeille.');
    }

    public function forceDestroy($id)
        {
            Type::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
            return back()->with('info', 'Le type a bien été supprimé définitivement dans la base de données.');
        }

public function restore($id)
    {
        Type::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le type a bien été restauré.');
    }

}
