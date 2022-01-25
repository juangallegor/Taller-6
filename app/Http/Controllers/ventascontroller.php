<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ventascontroller extends Controller
{
    public function index()
    {
        $ventas = ventas::all();
        return view('ventas.index')->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Sirve para redireccionarme a la vista
        return view("ventas.almacenar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ventas = new ventas();
        $ventas->id_venta = $request->id_venta;
        $ventas->save();

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventas = ventas::find($id);
        return view('ventas.Editar')->with('ventas',$ventas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_venta' => 'required',
            
        ]);

        $ventas = ventas::find($id);

        $ventas->id_venta = $request->id_venta;
        
        $ventas->save();

        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventas = ventas::find($id);
        $ventas->delete();
        //Recargar la vista:
        return redirect()->route('productos.index');
    }
}