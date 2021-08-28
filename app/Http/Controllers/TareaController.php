<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    //INDEX
    public function index(Request $request)
    {   
        $tareas = Tarea::query();

        if ($request->get('id')){
            $tareas->where('user_id', '=', $request->get('id'));
        }

        return $tareas->get();
        
        
    }   

    //retorna todas las tareas que están finalizadas
    public function finished(Request $request)
    {
        $tareas = Tarea::query();
        return $tareas->where('finished', '=', 1)->get();
    }

    //retorna todas las tareas que están en progreso
    public function inProgress(Request $request)
    {
        $tareas = Tarea::query();
        return $tareas->where('finished', '=', 0)->get();
    }

    //retorna todas las tareas organizadas por fecha de vencimiento
    public function byDueDate(Request $request)
    {
        return $tareas = Tarea::orderBy('due_date', 'asc')->get();
    }
   
    public function create()
    {
        //
    }


    //CREATE
   
    public function store(Request $request)
    {
        $tarea = new Tarea;
        $tarea->create($request->all());

        return response()->json('Tarea guardada!');

    }

  
    //READ
    public function show(Tarea $tarea)
    {
        return $tarea;
        
    }

    

    public function edit($id)
    {
        //
    }

   
    //UPDATE
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->update($request->all());

        return response()->json('Tarea updated!');

    }

    
    //DELETE
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();

        return response()->json('Tarea deleted!');
    }
}
