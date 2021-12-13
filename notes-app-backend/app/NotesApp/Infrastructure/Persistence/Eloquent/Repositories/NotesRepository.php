<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Repositories;

use App\NotesApp\Domain\Collections\NotesCollection;
use App\NotesApp\Domain\Repositories\NoteRepositoryInterface;
use App\NotesApp\Domain\Requests\CreateNoteRequest;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Models\Note;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Models\Tag;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Models\TagsMap;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class NotesRepository implements NoteRepositoryInterface
{

    /**
     * @return NotesCollection
     */
    public function getNotes(): NotesCollection
    {
        $notesCollection = new NotesCollection();

        $result = Note::with('tagsmap')->get()->sortByDesc('created_at');

        return $notesCollection->merge($this->constructNotesCollection($result));
    }

    /**
     * @param CreateNoteRequest $createNoteRequest
     */
    public function createNote(CreateNoteRequest $createNoteRequest): void
    {
        $note = new Note();

        $note->title = $createNoteRequest->getTitle();

        $note->description = $createNoteRequest->getDescription();

        $note->save();

        foreach ($createNoteRequest->getTags() as $tagId){
            $tagsMap = new TagsMap();
            $tagsMap->note_id = $note->id;
            $tagsMap->tag_id = $tagId;
            $tagsMap->save();
        }
    }

    /**
     * @param Collection $notesModelCollection
     * @return NotesCollection
     */
    private function constructNotesCollection(Collection $notesModelCollection): NotesCollection
    {
        $notesCollection = new NotesCollection();

        foreach ($notesModelCollection as $noteModel) {
            $note = $this->constructNote($noteModel);

            $notesCollection->push($note);
        }

        return $notesCollection;
    }

    /**
     * @param $note
     * @return \App\NotesApp\Domain\Models\Note
     */
    private function constructNote($note): \App\NotesApp\Domain\Models\Note
    {
        $tagsArray = $this->getAssociatedTagsArray($note->tagsmap);
        return new \App\NotesApp\Domain\Models\Note(
            $note->id,
            $note->title,
            $note->description,
            $note->created_at,
            $note->updated_at,
            $tagsArray
        );
    }

    /**
     * @param Collection $tagsmap
     */
    private function getAssociatedTagsArray(Collection $tagsmap): array
    {
        $tagsMapArray = array();

        foreach ($tagsmap as $mapItem) {
            $tagName = Tag::find($mapItem->tag_id)->name;
            array_push($tagsMapArray, $tagName);
        }

        return $tagsMapArray;
    }
}
