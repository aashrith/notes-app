<?php

namespace App\NotesApp\Domain\Requests;

/**
 * @OA\Schema(
 *      title="Create Tag request",
 *      description="Create Tag request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class CreateTagRequest extends BaseRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new Tag",
     *      example="Tag 1"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }
}
