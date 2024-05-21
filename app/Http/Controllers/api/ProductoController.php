<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as category_name')
        ->get();

        return response()->json(['productos' => $productos],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->name = $request->name;   
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->category_id = $request->category_id;
        $producto->save();

       return response()->json(['productos' => $producto], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);
        if (is_null($producto)) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        return response()->json(['producto' => $producto], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        if (is_null($producto)) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->category_id = $request->category_id;
        $producto->save();

        return response()->json(['productos' => $producto], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        if (is_null($producto)) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $producto->delete();

        return response()->json(['mensaje' => 'Producto eliminado correctamente'], 200);

    }
}
