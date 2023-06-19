<?php

namespace App\Http\Controllers;

use App\Models\cathegorie;
use App\Models\produits;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = produits::all();
        return view('produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
        public function create() {
            $cathegorie=cathegorie::all();
            return view('produits.create',compact('cathegorie'));
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
        $file = $request->chemin;
        $path = $file -> store("images", "public");
        $data["chemin"] = $path;
        // dd($data);
        produits::create($data);
        return   redirect()->route('produits.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
