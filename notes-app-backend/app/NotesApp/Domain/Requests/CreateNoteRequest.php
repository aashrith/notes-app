<?php

namespace App\NotesApp\Domain\Requests;

/**
 * @OA\Schema(
 *      title="Create Note request",
 *      description="Create Note request body data",
 *      type="object",
 *      required={"title", "description"}
 * )
 */
class CreateNoteRequest extends BaseRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="tile of the new note",
     *      example="Note title 1"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new note",
     *      example="This is new note's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @param string $title
     * @param string $description
     */
    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }
}
