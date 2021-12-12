<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Repositories;

use App\NotesApp\Domain\Collections\TagsCollection;
use App\NotesApp\Domain\Repositories\TagRepositoryInterface;
use App\NotesApp\Domain\Requests\CreateTagRequest;
use App\NotesApp\Domain\Requests\DeleteTagRequest;

class TagsRepository implements TagRepositoryInterface
{

    public function getTags(): TagsCollection
    {
        // TODO: Implement getTags() method.
    }

    public function createNote(CreateTagRequest $createTagRequest): TagsCollection
    {
        // TODO: Implement createNote() method.
    }

    public function deleteTag(DeleteTagRequest $deleteTagRequest): void
    {
        // TODO: Implement deleteTag() method.
    }
}
