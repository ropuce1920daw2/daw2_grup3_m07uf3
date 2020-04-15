<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\programas;
class programasctl extends Controller
{
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
        return view('programas.AñadirPrograma');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'idPrograma'      =>   'required',
            'nomPrograma'       =>  'required',
            'DesPrograma'       =>  'required',
            'tipusPrograma'       =>  'required',
            'clasificacioPrograma'       =>  'required',
            'idCanalpro'       =>  'required'
        ]);
        
        $noucanal = new programas([
            'id_Programa'      =>   $request->get('idPrograma'),
            'nom_Programa'       =>  $request->get('nomPrograma'),
            'Descripcio'       =>  $request->get('DesPrograma'),
            'tipus'       =>  $request->get('tipusPrograma'),
            'clasificacio'       =>  $request->get('clasificacioPrograma'),
            'id_Canal'       =>  $request->get('idCanalpro'),
            
        ]);
        $noucanal->save();
        
        return redirect()->route('programas.create')->with('Exit','Dades afegides');
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
