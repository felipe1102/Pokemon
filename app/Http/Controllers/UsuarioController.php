<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Validator;

class UsuarioController extends Controller
{
	public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index', 'show', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    	$data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required',
        ]);
        

        if($validator->fails()) {
            return response()->json([
                'message'   => 'Dados invalidos',
                'errors'    => $validator->errors()->all()
            ], 422);
        }

        
        $usu = new Usuarios();
        $usu->name = $data['name'];
        $usu->email = $data['email'];
        $usu->password = bcrypt($data['password']);
        $usu->save();

        return response()->json($usu, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $i = Auth::check();
        dd($i);
        return response()->json($i);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
