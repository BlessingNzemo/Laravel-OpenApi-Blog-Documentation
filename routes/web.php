<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EtiquetteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [TestController::class, "hello"]);

Route::get("/nombre/{a}/{b}",function($a, $b){
    return "le nombre $a + $b = ".($a + $b);
});

Route::get("/article", function(){
    return response()->json([
        ["id"=>1, "title"=>"Formation Laravel"],
        ["id"=>2, "title"=>"Formation Python"]
    ]);
});

Route::get("/pays", [TestController::class, "pays"])->name("listePays");

Route::post("/pays", [TestController::class, "store"])->name("savePays");

Route::get("/pays/create", [TestController::class, "create"])->name("createPays");

Route::resource("articles", ArticleController::class);

// Route::get("/pays/{id}", [TestController::class, "getId"]);
Route::get("/pays/{id}", [TestController::class, "showContrie"])->name("detailPays");

Route::resource("categories", CategorieController::class);

Route::resource("etiquettes", EtiquetteController::class);

