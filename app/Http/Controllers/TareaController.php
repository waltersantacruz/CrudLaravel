<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

/**
* @OA\Info(
*   title="API Tareas", 
*   version="1.0")
*
* @OA\Server(url="http://localhost:8000")
*
* 
* @OA\SecurityScheme(
*     type="http",
*     description="Use postman to register and get a token through http://localhost:8000/api/register ",
*     name="Token based Based",
*     in="header",
*     scheme="bearer",
*     bearerFormat="JWT",
*     securityScheme="apiAuth",
* )
**/
 


class TareaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * @OA\Get(
     *   path="/api/tareas/consultar",
     *   summary="Returns all tareas created",
     *   @OA\Response(
     *         response=200,
     *         description="json schema",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Something went wrong, try again"
     *     ),
     *     security={ {"apiAuth": {}} },
     * )
    */
    //INDEX
    public function index(Request $request)
    {   
        $tareas = Tarea::query();

        if ($request->get('id')){
            $tareas->where('user_id', '=', $request->get('id'));
        }

        return $tareas->get();
           
    }   

    /**
    * @OA\Get(
     *   path="/api/tareas/consultar/finalizadas",
     *   summary="Returns all tareas that are finished",
     *   @OA\Response(
     *         response=200,
     *         description="json schema",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Something went wrong, try again"
     *     ),
     *     security={ {"apiAuth": {}} },
     * )
    */
    //retorna todas las tareas que están finalizadas
    public function finished(Request $request)
    {
        $tareas = Tarea::query();
        return $tareas->where('finished', '=', 1)->get();
    }


    /**
    * @OA\Get(
     *   path="/api/tareas/consultar/enprogreso",
     *   summary="Returns all tareas that are in progress",
     *   @OA\Response(
     *         response=200,
     *         description="json schema",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Something went wrong, try again"
     *     ),
     *     security={ {"apiAuth": {}} },
     * )
    */
    //retorna todas las tareas que están en progreso
    public function inProgress(Request $request)
    {
        $tareas = Tarea::query();
        return $tareas->where('finished', '=', 0)->get();
    }



    /**
    * @OA\Get(
     *   path="/api/tareas/consultar/vencimiento",
     *   summary="Returns all tareas order by due_date",
     *   @OA\Response(
     *         response=200,
     *         description="json schema",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Something went wrong, try again"
     *     ),
     *     security={ {"apiAuth": {}} },
     * )
    */
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

        return response()->json('Tarea created successfully!');

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
