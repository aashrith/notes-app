<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @OA\Get(
     *      path="/notes",
     *      operationId="getNotesList",
     *      tags={"Notes"},
     *      summary="Get list of notes",
     *      description="Returns list of notes",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/NotesResource")
     *       )
     *     )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *   @OA\Post(
     *      path="/notes",
     *      operationId="storeNote",
     *      tags={"Notes"},
     *      summary="Store new note",
     *      description="Returns note data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateNoteRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Note")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

}
