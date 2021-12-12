<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

/** @noinspection PhpUnused */

class TagsMap extends Model
{
    protected $table = 'tagsmap';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notes_id',
        'tags_id',
    ];

    /**
     * Get the Note for the tag map
     */
    public function note(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\NotesApp\Infrastructure\Persistence\Eloquent\Models\Note');
    }

    /**
     * Get the Tag for the tag map
     */
    public function tag(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\NotesApp\Infrastructure\Persistence\Eloquent\Models\Tag');
    }
}
