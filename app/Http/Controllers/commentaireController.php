<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use App\Models\produits;
use Illuminate\Http\Request;

class commentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commentaire = commentaire::all();
        // return view('produits.show',compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
        public function create() {
            $produit=produits::all();
            $commentaire=commentaire::all();
            return view('commentaire.create',compact('commentaire','produit'));
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
        commentaire::create($data);
        return   redirect()->route('commentaire.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
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
        $commentaire=commentaire::find($id);
        return view('commentaire.show',compact('commentaire'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit=produits::all();
        $commentaire=commentaire::find($id);
        return view('commentaire.edit',compact('commentaire','produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commentaire=commentaire::find($id);
        $data = $request->all();
        $commentaire->update($data);
        return   redirect()->route('commentaire.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $commentaire=commentaire::find($id);
        $commentaire->delete();
        return   redirect()->route('commentaire.index')->with("addSuccess", "Le Produit a ete supprimer ");
    }
}
