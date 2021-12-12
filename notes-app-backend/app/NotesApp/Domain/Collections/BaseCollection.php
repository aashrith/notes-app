<?php

namespace App\NotesApp\Domain\Collections;

use Illuminate\Support\Collection;

abstract class BaseCollection extends Collection
{
    /**
     * @var int|null
     */
    private $totalCount = null;
    /**
     * @var bool
     */
    private $isPageable = false;

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount ?? count($this);
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount(int $totalCount): void
    {
        $this->isPageable = true;
        $this->totalCount = $totalCount;
    }

    /**
     * @return bool
     */
    public function isPageable(): bool
    {
        return $this->isPageable;
    }
}
