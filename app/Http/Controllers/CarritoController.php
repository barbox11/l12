<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Traemos todos los productos del usuario logueado
        $item = Carrito::where('user_id', Auth::id())->with('product')->get();

        
        return view('carrito', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sku' => 'required',
            'cantidad' => 'required',
        ]);
        $item = Carrito::where('user_id', Auth::user()->id)->where('producto_sku', $request->sku)->first();

        if ($item) {
            $item->cantidad += $request->cantidad;
            $item->save();
        } else {
            Carrito::create([
                'user_id' => Auth::user()->id,
                'producto_sku' => $request->sku,
                'cantidad' => $request->cantidad,
            ]);
        }
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
