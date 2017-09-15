<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemons;

class PokemonController extends Controller
{

    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index', 'show', 'store', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkm = Pokemons::all();
        
        return response()->json($pkm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $pkm = new Pokemons();

        $pkm->fill($request->all());
        $pkm->save();

        return response()->json($pkm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pkm = Pokemons::find($id);
        if(!$pkm) {
            return response()->json([
                'message'   => 'Nenhum registro Encontrado',
            ], 404);
        }

        return response()->json($pkm);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $pkm = Pokemons::find($id);

        if(!$pkm) {
            return response()->json([
                'message'   => 'Nenhum registro Encontrado',
            ], 404);
        }

        $pkm->fill($request->all());
        $pkm->save();

        return response()->json($pkm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkm = Pokemons::find($id);

        if(!$pkm) {
            return response()->json([
                'message'   => 'Nenhum registro Encontrado',
            ], 404);
        }

        $pkm->delete();
        return response()->json([
            'message'   => 'Pokemon deletado',
        ]);
    }

    
}
