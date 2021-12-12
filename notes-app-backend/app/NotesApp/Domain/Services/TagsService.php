<?php

namespace App\NotesApp\Domain\Services;

use App\NotesApp\Domain\Collections\TagsCollection;
use App\NotesApp\Domain\Repositories\TagRepositoryInterface;
use App\NotesApp\Domain\Requests\CreateTagRequest;
use App\NotesApp\Domain\Requests\DeleteTagRequest;
use App\NotesApp\Exceptions\ApplicationException;

class TagsService
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagsRepository;

    /**
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagsRepository = $tagRepository;
    }

    /**
     * @return TagsCollection
     * @throws ApplicationException
     */
    public function getTags(): TagsCollection
    {
        try {
            $tagsCollection = $this->tagsRepository->getTags();
        } catch (\Exception $exception) {
            throw new ApplicationException(sprintf('Something went wrong while getting tags %s', $exception->getMessage()));
        }

        return $tagsCollection;
    }

    /**
     * @param CreateTagRequest $createTagRequest
     * @throws ApplicationException
     */
    public function createTag(CreateTagRequest $createTagRequest): void
    {
        try {
            $this->tagsRepository->createTag($createTagRequest);
        } catch (\Exception $exception) {
            throw new ApplicationException(sprintf('Something went wrong while creating Tag %s', $exception->getMessage()));
        }
    }

    /**
     * @param DeleteTagRequest $deleteTagRequest
     * @throws ApplicationException
     */
    public function deleteTag(DeleteTagRequest $deleteTagRequest): void
    {
        try {
            $this->tagsRepository->deleteTag($deleteTagRequest);
        } catch (\Exception $exception) {
            throw new ApplicationException(sprintf('Something went wrong while deleting Tag %s', $exception->getMessage()));
        }
    }


}
