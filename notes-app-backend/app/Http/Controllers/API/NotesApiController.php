<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotesResource;
use App\NotesApp\Domain\Requests\CreateNoteRequest;
use App\NotesApp\Domain\Services\NotesService;
use App\NotesApp\Exceptions\ApplicationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class NotesApiController extends Controller
{

    /**
     * @var NotesService
     */
    private $notesService;

    /**
     * @param NotesService $notesService
     */
    public function __construct(NotesService $notesService)
    {
        $this->notesService = $notesService;
    }


    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
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
     * @return AnonymousResourceCollection
     * @throws ApplicationException
     */
    public function index()
    {
        return NotesResource::collection($this->notesService->getNotes());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
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
     * @param Request $request
     * @return void
     * @throws ApplicationException|ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:1|max:50',
            'description' => 'required|min:1|max:200',
        ]);
        $createNoteRequest = new CreateNoteRequest(
            $request->input('title'),
            $request->input('description'),
            $request->input('tags')
        );

        $this->notesService->createNote($createNoteRequest);
    }

}
