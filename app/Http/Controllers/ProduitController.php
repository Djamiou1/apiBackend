<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\Produit as produitRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $produits = Produit::all();

       return $produits;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function storee(Request $request)
    // {
    //    $result = $request->file('image')->store('public');
    //    return ['resultat' => $result];
    // }
    public function store(Request $request)
    {
       $produit = new Produit;
       //récupération d'image
       $path = $request->file('image')->store('public');
       //insertion
       $produit->title = $request->title;
       $produit->image = $path;
       $produit->category = $request->category;
       $produit->localisation = $request->localisation;
       $produit->price = $request->price;
    //    $produit->user_id = auth()->user()->id;
       $produit->description = $request->description;
       $produit->save();

       if($produit->save()){

            return [
                'success' => 'Produit ajouté avec success'
            ];

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return $produit; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Produit $produit)
    {
        // $arrayUpdate = [
        //     'title' => $request->title,
        //     'category' => $request->category,
        //     'description' => $request->description,
        //     'localisaion' => $request->localisaion,
        //     'price' => $request->price,
        //    ];
        //    if($request->image != null){

        //     $path = $request->file('image')->store('public');
    
        //     $arrayUpdate = array_merge($arrayUpdate,[
        //         'image' => $path
        //     ]);
        //    }
        //     $produit->update($arrayUpdate);

        //     if($produit->update($arrayUpdate)){
        //         return [
        //             'success' => 'Produit modifié avec success'
        //         ];
        //     }

        $produit = Produit::find($id);
        //récupération d'image
        $path = $request->file('image')->store('public');
        //insertion
        $produit->title = $request->title;
        $produit->image = $path;
        $produit->category = $request->category;
        $produit->localisation = $request->localisation;
        $produit->price = $request->price;
     //    $produit->user_id = auth()->user()->id;
        $produit->description = $request->description;
        $produit->save();
 
        if($produit->save()){
 
             return [
                 'success' => 'Produit modifié avec success'
             ];
 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
    }
}
