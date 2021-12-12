<?php

namespace App\NotesApp\Domain\Repositories;


use App\NotesApp\Domain\Collections\TagsCollection;
use App\NotesApp\Domain\Requests\CreateTagRequest;
use App\NotesApp\Domain\Requests\DeleteTagRequest;

interface TagRepositoryInterface
{

    /**
     * @return TagsCollection
     */
    public function getTags(): TagsCollection;

    /**
     * @param CreateTagRequest $createTagRequest
     * @return void
     */
    public function createTag(CreateTagRequest $createTagRequest): void;

    /**
     * @param DeleteTagRequest $deleteTagRequest
     */
    public function deleteTag(DeleteTagRequest $deleteTagRequest): void;
}
