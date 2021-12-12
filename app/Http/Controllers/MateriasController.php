<?php

namespace App\Http\Controllers;

use App\Materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MateriasController extends Controller
{

    public function index()
    {
        $materias = Materias::latest()->paginate(5);
        return view('pages.materias',[ 'materias'=> $materias,]);
    }



    public function store(Request $request)
    {
         $validatedData = Validator::make($request->all(),[
                                'nombre' => 'required|string|min:5|max:30',

                            ]);
                     if($validatedData->fails()){
                       return redirect()->route('materias.index')
                              ->withErrors($validatedData)
                                ->withInput();
                     }
                       Materias::create([
                           'nombre'=>$request->nombre,
                        ]);

                return redirect()->route('salones.index')->with('añadido', 'La materia  se ha agregado exitosamente!');
    }



    public function update(Request $request, Materias $materias)
    {
                          $validatedData = Validator::make($request->all(),[
                                'nombre' => 'required|string|min:5|max:30',
                            ]);
                            if($validatedData->fails()){
                             return redirect()->route('materias.index')
                                   ->withErrors($validatedData)
                                    ->withInput();
                                               }
                             $materias->update($request->all());
                   return redirect()->route('materias.index')->with('añadido', 'La materia se ha editado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $estudiante = Materias::find($id);
                     $estudiante->delete();
                         return redirect()->route('materias.index')->with('eliminado', 'El registro se ha eliminado');
    }
}
