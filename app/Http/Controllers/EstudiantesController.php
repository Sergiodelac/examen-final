<?php

namespace App\Http\Controllers;

use App\Estudiantes;
use App\Salones;
use App\Materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EstudiantesController extends Controller
{

    public function index()
    {
          $estudiantes = Estudiantes::latest()->paginate(5);
          $salones = Salones::all();
          $materias = Materias::all();
        return view('pages.estudiantes',['estudiantes'=> $estudiantes,'salones'=> $salones,'materias'=> $materias,]);
    }



    public function store(Request $request)
    {
  //validacion
               $validatedData = Validator::make($request->all(),[
                   'nombre' => 'required|string|min:5|max:30',
                    'matricula' => 'required|min:5|max:30',
                     'apellido_paterno' => 'required|string|min:5|max:60',
                      'apellido_materno' => 'required|string|min:5|max:60',
                       'salon_id' => 'required',
                        'materias_id' => 'required',
               ]);
             if($validatedData->fails()){
                  return redirect()->route('estudiantes.index')
                                          ->withErrors($validatedData)
                                          ->withInput();
             }
               Estudiantes::create([
                   'nombre'=>$request->nombre,
                   'matricula'=>$request->matricula,
                   'apellido_paterno'=>$request->apellido_paterno,
                   'apellido_materno'=>$request->apellido_materno,
                   'salon_id'=>$request->salon_id,
                   'materias_id'=>$request->materias_id
               ]);
               return redirect()->route('estudiantes.index')->with('añadido', 'El estudiante  se ha agregado exitosamente!');

    }



    public function update(Request $request, Estudiantes $estudiantes)
    {
            $validatedData = Validator::make($request->all(),[
                         'nombre' => 'required|string|min:5|max:30',
                          'matricula' => 'required|min:5|max:30',
                           'apellido_paterno' => 'required|string|min:5|max:60',
                            'apellido_materno' => 'required|string|min:5|max:60',
                             'salon_id' => 'required',
                              'materias_id' => 'required',
                     ]);
                   if($validatedData->fails()){
                        return redirect()->route('estudiantes.index')
                                                ->withErrors($validatedData)
                                                ->withInput();
                   }
                $estudiantes->update($request->all());
                    return redirect()->route('estudiantes.index')->with('añadido', 'El estudiante  se ha editado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        $estudiante = Estudiantes::find($id);
             $estudiante->delete();
                 return redirect()->route('estudiantes.index')->with('eliminado', 'El registro se ha eliminado');
    }
}
