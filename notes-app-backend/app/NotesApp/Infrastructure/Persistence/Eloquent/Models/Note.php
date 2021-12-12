<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * title="Note",
 * description="Note model",
 * @OA\Property(
 * property="title",
 * type="string",
 * description="Note title",
 * example="Notes Title 1"
 * ),
 * @OA\Property(
 * property="description",
 * type="text",
 * description="Note description",
 * example="Note description - Lorem ipsum, in graphical and textual context, refers to filler..."
 * ),
 * )
 */
class Note extends Model
{
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Get the Tags Map for the note
     */
    public function tagsmap(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\NotesApp\Infrastructure\Persistence\Eloquent\Models\TagsMap');
    }
}
