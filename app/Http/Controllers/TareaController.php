<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    //AUTH
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index
    public function index()
    {   
        $tarea = Tarea::all()->toArray();
        return $tarea; 
    }   

   
    public function create()
    {
        
    }

    //CREATE
    public function store(Request $request)
    {
        $tarea = new Tarea([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'gender' => $request->input('gender')
        ]);
        $tarea->save();

        return response()->json('tarea created successfully!');

    }

   
    //READ
    public function show($id)
    {
        $tarea = Tarea::find($id);
        return response()->json($tarea);
        
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

        return response()->json('Tarea updated successfully!');
    }

    
    //DELETE
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();

        return response()->json('Tarea deleted successfully!');
    }
}
