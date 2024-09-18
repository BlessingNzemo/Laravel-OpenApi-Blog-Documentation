<?php

namespace App\Http\Controllers;

use App\Models\Etiquette;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class EtiquetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquettes = Etiquette::orderBy("id", "desc")->get();
        return view("etiquettes.index", compact("etiquettes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("etiquettes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:30|min:3|unique:etiquettes",
            "description" => "min:10|nullable"
        ]);

        $etiquettes = Etiquette::create([
            "name"=>$request->name,
            "description"=>$request->description
        ]);
        
        return redirect()->route("etiquettes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Etiquette $etiquette)
    {
        $etiquettes = $etiquette;

        return view("etiquettes.show", compact("etiquettes"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiquette $etiquette)
    {
        $etiquettes = $etiquette;

        return view("etiquettes.edit", compact("etiquettes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etiquette $etiquette)
    {
        $request->validate([
            "name" => "required|max:30|min:3|unique:etiquettes",
            "description" => "min:10|nullable"
        ]);

        $etiquette->update([
           "name" => $request->name,
           "description" => $request->description
        ]);
        
        redirect()->route("etiquettes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etiquette $etiquette)
    {
        $etiquette->delete();
           
        return back()->with("success", "Suppression reussie");
        
    }
}
