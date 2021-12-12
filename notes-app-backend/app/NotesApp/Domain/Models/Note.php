<?php

namespace App\NotesApp\Domain\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Jsonable;

class Note implements Jsonable
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var Carbon
     */
    private $createdAt;
    /**
     * @var Carbon
     */
    private $updatedAt;

    /**
     * @var array
     */
    private $tagsArray;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param Carbon $createdAt
     * @param Carbon $updatedAt
     * @param array $tagsArray
     */
    public function __construct(int $id, string $title, string $description, Carbon $createdAt, Carbon $updatedAt, array $tagsArray)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->tagsArray = $tagsArray;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @return array
     */
    public function getTagsArray(): array
    {
        return $this->tagsArray;
    }


    /**
     * @param int $options
     * @return array
     */
    public function toJson($options = 0)
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'createdAt' => $this->getCreatedAt(),
            'updatedAt' => $this->getUpdatedAt(),
            'tagsArray' => $this->getTagsArray()
        ];
    }
}
