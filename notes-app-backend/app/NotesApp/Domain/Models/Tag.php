<?php

namespace App\NotesApp\Domain\Models;

use Carbon\Carbon;

class Tag extends BaseModel
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var Carbon
     */
    private $createdAt;
    /**
     * @var Carbon
     */
    private $updatedAt;

    /**
     * @param int $id
     * @param string $name
     * @param Carbon $createdAt
     * @param Carbon $updatedAt
     */
    public function __construct(int $id, string $name, Carbon $createdAt, Carbon $updatedAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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
    public function getName(): string
    {
        return $this->name;
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
     * @param int $options
     * @return array
     */
    public function toJson($options = 0)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'createdAt' => $this->getCreatedAt(),
            'updatedAT' => $this->getUpdatedAt(),

        ];
    }
}
