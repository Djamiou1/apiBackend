<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\Produit as produitRequest;
use Illuminate\Support\Facades\Auth;

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
    
    public function store(Request $request)
    {
       $produit = new Produit;
       //récupération d'image
       $filename = time() . '.' . $request->image->extension();
        $path = $request->file('image')->storeAs(
            'avatars',
            $filename,
            'public'
        );
       //insertion
       $produit->title = $request->title;
       $produit->image = $path;
       $produit->category = $request->category;
       $produit->localisation = $request->localisation;
       $produit->price = $request->price;
       $produit->user_id = $request->user_id;
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
    public function update(Request $request, Produit $produit)
    {
        $arrayUpdate = [
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'localisaion' => $request->localisaion,
            'price' => $request->price,
            'user_id' => $request->user_id
           ];
           if($request->image != null){
            $filename = time() . '.' . $request->image;
            $path = $request->file('image')->storeAs(
                'avatars',
                $filename,
                'public'
            );
    
            $arrayUpdate = array_merge($arrayUpdate,[
                'image' => $path
            ]);
           }
            $produit->update($arrayUpdate);
    
        
            if($produit->update($arrayUpdate)){
     
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
