<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class Controllercategorie extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorie = categorie::all();
        return view('categorie.index', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $categorie = categorie::all();
        return view('categorie.create', compact('categorie'));
    } //


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "categorie" => ['unique:categories', 'max:255', 'required']
            ]
        );
        $data = $request->all();
        categorie::create($data);
        return  redirect()->route('categorie.create')->with("addSuccess", "Le Produit a été ajouté avec succés");
    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = categorie::find($id);
        return view('categorie.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = categorie::find($id);
        return view('categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                "categorie" => ['required', 'max:255', 'unique:categories,id,'.$id]
            ]
        );
        $categorie = categorie::find($id);
        $data = $request->all();
        $categorie->update($data);
        return   redirect()->route('categorie.index')->with("editSuccess", "Le Produit a été Modifié avec succés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $produit = categorie::find($id);
        $produit->delete();
        return   redirect()->route('categorie.index')->with("addSuccess", "Le Produit a ete supprimer ");
    }
}
