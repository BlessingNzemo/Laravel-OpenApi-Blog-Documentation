<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     /**
     * @OA\Get(
     *      path="/categories",
     *      operationId="getCategorieList",
     *      tags={"Categorie"},
     *      summary="Get list of categories",
     *      description="Returns list of categories",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Page not found"
     *      )
     *     )
     */

    public function index()
    {
        $categories = Categorie::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */

         /**
     * @OA\Post(
     *      path="/categories",
     *      operationId="storeCategorie",
     *      tags={"Categorie"},
     *      summary="Store new categories",
     *      description="Returns categories data",
     *      @OA\RequestBody(
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Page not found"
     *      )
     * )
     */
    public function store(Request $request)
    {
        $check = $categorie = Categorie::create([
            "name"=>$request->name,
            "description"=>$request->description
        ]);

        if ($check){
            return response()->json(["result"=>"Enregistrement reussi"]);
        }
        
    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *      path="/categories/{id}",
     *      operationId="getCategorieById",
     *      tags={"Categorie"},
     *      summary="Get categories information",
     *      description="Returns categories data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Categorie id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Page not found"
     *      )
     * )
     */
    public function show(Categorie $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */

     /**
     * @OA\Put(
     *      path="/categories/{id}",
     *      operationId="updateCategorie",
     *      tags={"Categorie"},
     *      summary="Update existing categories",
     *      description="Returns updated categories data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Categorie id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Request $request, Categorie $categorie)
    {
        $check = $categorie = Categorie::create([
            "name"=>$request->name,
            "description"=>$request->description
        ]);

        if ($check){
            return response()->json(["result"=>"Modification reussie"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

     /**
     * @OA\Delete(
     *      path="/categories/{id}",
     *      operationId="deleteCategorie",
     *      tags={"Categorie"},
     *      summary="Delete existing categories",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Categorie id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Categorie $category)
    {
        if ($category->delete()){
            return response()->json(["result"=>"Suppression effectuee"]);
        }
    }
}
