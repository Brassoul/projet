<?php

namespace App\Http\Controllers;

use App\Models\cathegorie;
use Illuminate\Http\Request;

class Controllercathegorie extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cathegorie = cathegorie::all();
        return view('cathegorie.index',compact('cathegorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
        public function create() {
            $cathegorie=cathegorie::all();
            return view('cathegorie.create',compact('cathegorie'));
        } //
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /*$request->validate([
            'libelle' => 'required|max:60',
            'prix' => 'required|max:60',
            'quantite' => 'required|max:60',
            'description' => 'required|min:5|max:200',
            'chemin' => 'required|max:60',
        ]);*/


        // $s = storage_path('app');
        $data = $request->all();
        // $file = $request->chemin;
        // $path = $file -> store("images", "public");
        // $data["chemin"] = $path;
        // dd($data);
        cathegorie::create($data);
        return   redirect()->route('cathegorie.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
        // $t=new Document(["document"=> "$request->document","niveau"=>$request->niveau]);
        //$t=new Document()
        //        $t->document = $request->document;
        // ..
        // $t->niveau = $request->niveau;
        // $t->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cathegorie=cathegorie::find($id);
        return view('cathegorie.show',compact('cathegorie'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cathegorie=cathegorie::find($id);
        return view('cathegorie.edit',compact('cathegorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cathegorie=cathegorie::find($id);
        $data = $request->all();
        $cathegorie->update($data);
        return   redirect()->route('cathegorie.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $produit=cathegorie::find($id);
        $produit->delete();
        return   redirect()->route('cathegorie.index')->with("addSuccess", "Le Produit a ete supprimer ");
    }
}
