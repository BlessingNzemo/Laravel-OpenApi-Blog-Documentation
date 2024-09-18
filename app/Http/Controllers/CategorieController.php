<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Categorie::latest()->get();
        $categories = Categorie::orderBy("id", "desc")->get();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|max:50|min:3|unique:categories",
            "description"=>"min:10|nullable"
        ]);

        // $categorie = new Categorie();
        
        // $categorie->name = $request->name;
        // $categorie->description = $request->description;
        // $categorie->save();
        $categorie = Categorie::create([
            "name" => $request->name,
            "description"=>$request->description
        ]);

        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $category)
    {
        $categorie = $category;

        return view("categories.show", compact("categorie"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $category)
    {
        $categorie = $category;
        return view("categories.edit", compact("categorie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $category)
    {
        $request->validate([
            "name"=>"required|max:50|min:3|unique:categories",
            "description"=>"min:10|nullable"
        ]);
        
        $category->update([
            "name"=>$request->name,
            "description"=>$request->description
        ]);
        return redirect()->route("categories.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $category)
    {
    //    $category->delete();

    //     return redirect()->route("categories.index"); 
        $category->delete();
        return back()->with('success', 'suppression réussie');

    }
}
