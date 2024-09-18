<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    private $mespays = ["Congo", "Angola", "france", "Canada", "Etats-Unis"];
    private $paystab = [
        ["id"=>1, "title"=>"Canada"],
        ["id"=>2, "title"=>"Congo"],
        ["id"=>3, "title"=>"France"],
        ["id"=>4, "title"=>"Japon"]
    ];

    public function hello(){
        return "hello word";
    }

    public function pays(){
        $pays = $this->paystab;
        $title = "Liste des pays";

        // return view("pays", ["title"=>$title,"pays"=>$pays]);
        return view("pays", compact("title","pays"));
    }

    public function getId($a){
        return response()->json($this->paystab[$a]);
    }

    public function showContrie($id){
        $pays = $this->paystab[$id];

        return view("single", compact("pays"));
    }

    public function create(Request $request){
        return view("create");
    }

    public function store(Request $request) {
        // dd($request->input('name'));
        dd($request->name);
        // dd($request->all());
        // dd($request->method());
    }

}
