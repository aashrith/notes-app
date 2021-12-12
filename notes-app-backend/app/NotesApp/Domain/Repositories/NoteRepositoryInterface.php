<?php

namespace App\NotesApp\Domain\Repositories;

use App\NotesApp\Domain\Collections\NotesCollection;
use App\NotesApp\Domain\Requests\CreateNoteRequest;

interface NoteRepositoryInterface
{
    /**
     * @return NotesCollection
     */
    public function getNotes(): NotesCollection;

    /**
     * @param CreateNoteRequest $createNoteRequest
     * @return void
     */
    public function createNote(CreateNoteRequest $createNoteRequest): void;
}
