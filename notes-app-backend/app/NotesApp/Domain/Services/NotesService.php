<?php

namespace App\NotesApp\Domain\Services;

use App\NotesApp\Domain\Collections\NotesCollection;
use App\NotesApp\Domain\Repositories\NoteRepositoryInterface;
use App\NotesApp\Exceptions\ApplicationException;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class NotesService
{
    /**
     * @var NoteRepositoryInterface
     */
    private $notesRepository;

    /**
     * @param NoteRepositoryInterface $notesRepository
     */
    public function __construct(NoteRepositoryInterface $notesRepository)
    {
        $this->notesRepository = $notesRepository;
    }

    /**
     * @param $createNoteRequest
     * @throws ApplicationException
     */
    public function createNote($createNoteRequest): void
    {
        try {
            $this->notesRepository->createNote($createNoteRequest);
        } catch (\Exception $exception) {
            throw new ApplicationException(sprintf('Something went wrong while creating note %s', $exception->getMessage()));
        }
    }

    /**
     * @return NotesCollection
     * @throws ApplicationException
     */
    public function getNotes(): NotesCollection
    {
        try {
            $notesCollection = $this->notesRepository->getNotes();
        } catch (\Exception $exception) {
            throw new ApplicationException(sprintf('Something went wrong while getting notes %s', $exception->getMessage()));
        }
        return $notesCollection;
    }
}
