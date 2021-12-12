<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Repositories;

use App\NotesApp\Domain\Collections\TagsCollection;
use App\NotesApp\Domain\Repositories\TagRepositoryInterface;
use App\NotesApp\Domain\Requests\CreateTagRequest;
use App\NotesApp\Domain\Requests\DeleteTagRequest;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class TagsRepository implements TagRepositoryInterface
{

    /**
     * @return TagsCollection
     */
    public function getTags(): TagsCollection
    {
        $tagsCollection = new TagsCollection();

        $result = Tag::with('tagsmap')->get();

        return $tagsCollection->merge($this->constructTagsCollection($result));
    }

    /**
     * @param CreateTagRequest $createTagRequest
     * @return void
     */
    public function createTag(CreateTagRequest $createTagRequest): void
    {
        $tag = new Tag();

        $tag->name = $createTagRequest->getName();

        $tag->save();
    }

    /**
     * @param Collection $tagsCollection
     * @return TagsCollection
     */
    private function constructTagsCollection(Collection $tagsModelCollection): TagsCollection
    {
        $tagsCollection = new TagsCollection();

        foreach ($tagsModelCollection as $tagModel) {
            $tag = $this->constructTag($tagModel);

            $tagsCollection->push($tag);
        }

        return $tagsCollection;
    }

    /**
     * @param $tag
     * @return \App\NotesApp\Domain\Models\Tag
     */
    private function constructTag($tag): \App\NotesApp\Domain\Models\Tag
    {
        return new \App\NotesApp\Domain\Models\Tag(
            $tag->id,
            $tag->name,
            $tag->created_at,
            $tag->updated_at
        );
    }

    public function deleteTag(DeleteTagRequest $deleteTagRequest): void
    {
        $tag = Tag::find($deleteTagRequest->getId());
        $tag->delete();
    }
}
