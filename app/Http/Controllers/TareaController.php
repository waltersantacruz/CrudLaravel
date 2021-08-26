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
    public function index()
    {   
        return Tarea::get();
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
