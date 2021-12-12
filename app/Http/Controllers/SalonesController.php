<?php

namespace App\Http\Controllers;

use App\Salones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SalonesController extends Controller
{

    public function index()
    {

        $salones = Salones::latest()->paginate(5);
       return view('pages.salones',[ 'salones'=> $salones,]);
    }


    public function store(Request $request)
    {
                    $validatedData = Validator::make($request->all(),[
                        'nombre' => 'required|string|min:5|max:30',

                    ]);
             if($validatedData->fails()){
               return redirect()->route('salones.index')
                      ->withErrors($validatedData)
                        ->withInput();
             }
               Salones::create([
                   'nombre'=>$request->nombre,
                ]);


        return redirect()->route('salones.index')->with('añadido', 'El salon  se ha agregado exitosamente!');
    }



    public function update(Request $request, Salones $salones)
    {
                    $validatedData = Validator::make($request->all(),[
                        'nombre' => 'required|string|min:5|max:30',
                    ]);
                    if($validatedData->fails()){
                     return redirect()->route('salones.index')
                           ->withErrors($validatedData)
                            ->withInput();
                                       }
                     $salones->update($request->all());
           return redirect()->route('salones.index')->with('añadido', 'El salon se ha editado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $estudiante = Salones::find($id);
                     $estudiante->delete();
                         return redirect()->route('salones.index')->with('eliminado', 'El registro se ha eliminado');
    }
}
