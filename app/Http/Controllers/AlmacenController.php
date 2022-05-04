<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //para el borrado de la imagen

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['almacenes']=Almacen::paginate(10); //nombre del modelo Almacen::
        return view('almacen.almacen',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('almacen.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $datosAlmacen = request()->except('_token');
        if($request->hasFile('ubicacion')){ //atributo name
            $datosAlmacen['ubicacion'] = $request->file('ubicacion')->store('uploads','public'); // nombre del campo
        } 
        Almacen::insert($datosAlmacen);
        //return response()->json($datosAlmacen);
        return redirect('almacen')->with('mensaje','Almacen agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $almacen = Almacen::findOrFail($id);
        return view('almacen.editar',compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $datosAlmacen = request()->except('_token','_method');

        if($request->hasFile('ubicacion')){ //atributo name
            $almacen = Almacen::findOrFail($id); //recuperar la informacion 

            Storage::delete('public/'.$almacen->ubicacion);

            $datosAlmacen['ubicacion'] = $request->file('ubicacion')->store('uploads','public'); // nombre del campo
        } 

        Almacen::where('id','=',$id)->update($datosAlmacen);

        $almacen = Almacen::findOrFail($id);
        return view('almacen.editar',compact('almacen'));
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //para eliminar la imagen del storage
        $almacen = Almacen::findOrFail($id);
        if(Storage::delete('public/'.$almacen->ubicacion)){ // borrar imagen fisica
            Almacen::destroy($id);
        }

        
        return redirect('almacen')->with('mensaje','Almacen eliminado');
    }
}
