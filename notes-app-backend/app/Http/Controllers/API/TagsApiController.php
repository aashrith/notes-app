<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsApiController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
