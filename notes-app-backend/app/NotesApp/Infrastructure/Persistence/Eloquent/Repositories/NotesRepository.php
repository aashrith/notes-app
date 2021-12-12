<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Repositories;

use App\NotesApp\Domain\Collections\NotesCollection;
use App\NotesApp\Domain\Repositories\NoteRepositoryInterface;
use App\NotesApp\Domain\Requests\CreateNoteRequest;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Models\Note;

class NotesRepository implements NoteRepositoryInterface
{

    /**
     * @return NotesCollection
     */
    public function getNotes(): NotesCollection
    {
        $notesCollection = new NotesCollection();


    }

    public function createNote(CreateNoteRequest $createNoteRequest): NotesCollection
    {
        // TODO: Implement createNote() method.
    }
}
