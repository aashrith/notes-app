<?php

namespace App\NotesApp\Domain\Collections;

use Illuminate\Contracts\Support\Jsonable;

abstract class BaseModelCollection extends BaseCollection implements Jsonable
{
    public function toJsonArray(): array
    {
        return $this->map(function (Jsonable $model) {
            return $model->toJsonArray();
        })->toArray();
    }
}
