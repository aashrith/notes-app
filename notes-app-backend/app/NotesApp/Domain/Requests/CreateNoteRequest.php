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
     * @OA\Property(
     *      title="tags",
     *      type="array",
     *       @OA\Items(
     *               type="number",
     *               description="tag ID",
     *               @OA\Schema(type="number")
     *         ),
     *      description="Associated tags to note",
     *      example="All asssociated tags to note"
     * )
     *
     * @var array
     */
    public $tags;

    /**
     * @param string $title
     * @param string $description
     * @param array $tags
     */
    public function __construct(string $title, string $description, array $tags)
    {
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
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

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }


    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }
}
