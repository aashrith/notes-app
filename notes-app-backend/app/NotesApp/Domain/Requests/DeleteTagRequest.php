<?php

namespace App\NotesApp\Domain\Requests;

/**
 * @OA\Schema(
 *      title="Delete Tag request",
 *      description="Delete Tag by id",
 *      type="object",
 *      required={"id"}
 * )
 */
class DeleteTagRequest extends BaseRequest
{
    /**
     * @OA\Property(
     *      title="tag_id",
     *      description="Tag's id of the soon to be deleted tag",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }
}
