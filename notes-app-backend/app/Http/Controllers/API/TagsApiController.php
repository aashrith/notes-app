<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagsResource;
use App\NotesApp\Domain\Requests\CreateTagRequest;
use App\NotesApp\Domain\Requests\DeleteTagRequest;
use App\NotesApp\Domain\Services\TagsService;
use App\NotesApp\Exceptions\ApplicationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TagsApiController extends Controller
{
    /**
     * @var TagsService
     */
    private $tagsService;

    /**
     * @param TagsService $tagsService
     */
    public function __construct(TagsService $tagsService)
    {
        $this->tagsService = $tagsService;
    }

    /**
     * Display a listing of the resource.
     *
     * * @OA\Get(
     *      path="/tags",
     *      operationId="getTagsList",
     *      tags={"Tags"},
     *      summary="Get list of tags",
     *      description="Returns list of tags",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TagsResource")
     *       )
     *     )
     *
     * @return AnonymousResourceCollection
     * @throws ApplicationException
     */
    public function index()
    {
        return TagsResource::collection($this->tagsService->getTags());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/tags",
     *      operationId="storeTag",
     *      tags={"Tags"},
     *      summary="Store new Tag",
     *      description="Returns Tag data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateTagRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Tag")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:50',
        ]);
        $createTagRequest = new CreateTagRequest(
            $request->input('name'),
        );

        $this->tagsService->createTag($createTagRequest);
    }


    /**
     * Remove the specified resource from storage.
     *
     * /**
     * @OA\Delete(
     *      path="/tags/{id}",
     *      operationId="deleteTag",
     *      tags={"Tags"},
     *      summary="Delete existing tag",
     *      description="Deletes a tag record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Tag id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $deleteTagRequest = new DeleteTagRequest(
            $id
        );

        $this->tagsService->deleteTag($deleteTagRequest);
    }
}
