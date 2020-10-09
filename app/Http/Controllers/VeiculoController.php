<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos=\App\Veiculo::all();
        return view('index',compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('foto'))
         {
            $file = $request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);


         }
        $veiculo= new \App\Veiculo;
        $veiculo->nome=$request->get('nome');
        $veiculo->marca=$request->get('marca');
        $veiculo->categoria=$request->get('categoria');
        $veiculo->ano=$request->get('ano');
        $veiculo->foto=$name;
        $veiculo->save();
        
        return redirect('veiculos')->with('success', 'informação concluida');
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
        $veiculo = \App\Veiculo::find($id);
        return view('edit',compact('veiculo','id'));
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
        if($request->hasfile('foto'))

         {
            $file = $request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }

        $veiculo= \App\Veiculo::find($id);
        $veiculo->nome=$request->get('nome');
        $veiculo->marca=$request->get('marca');
        $veiculo->categoria=$request->get('categoria');
        $veiculo->ano=$request->get('ano');
        $veiculo->foto=$name;
        $veiculo->save();
        return redirect('veiculos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculo = \App\Veiculo::find($id);
        $veiculo->delete();
        return redirect('veiculos')->with('success','Informaão Deletada Com Sucesso');
    }
}
