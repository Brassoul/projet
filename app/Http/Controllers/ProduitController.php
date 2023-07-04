<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\produits;
use App\Models\cathegorie;
use App\Models\commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = produits::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $categorie = categorie::all();
        return view('produits.create', compact('categorie'));
    } //


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $file = $request->chemin;
        $path = $file->store("images", "public");
        $data["chemin"] = $path;
        produits::create($data);
        return   redirect()->route('produits.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $commentaire = commentaire::all();
        $produit = produits::find($id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = categorie::all();
        $produit = produits::find($id);
        return view('produits.edit', compact('produit', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produits = produits::find($id);
        $data = $request->all();
        if ($request->hasFile("chemin")) {
            Storage::delete("/storage/$produits->chemin");
            $file = $request->chemin;
            $path = $file->store("images", "public");
            $data["chemin"] = $path;
        }
        $produits->update($data);
        return   redirect()->route('produits.index')->with("editSuccess", "Le Produit a été Modifié avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $produit = produits::find($id);
        $produit->delete();
        return   redirect()->route('produits.index')->with("addSuccess", "Le Produit a ete supprimer ");
    }

    public function userViews()
    {
        $produits = produits::paginate(8);
        $comments = commentaire::all();
        $qrcode = [];
        foreach ($produits as  $produit) {
            $url = route('produits.show', ['id' => $produit->id]);
            $qrcode[$produit->id] = Qrcode::encoding("UTF-8")
                ->color(8, 114, 145)
                ->backgroundColor(245, 234, 62)
                ->size(40)
                ->generate($url);
        }
        return view('produits.produits', compact('produits', 'qrcode','comments'));
    }
}
