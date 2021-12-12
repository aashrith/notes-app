<?php

namespace App\NotesApp\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * title="Tag",
 * description="Notes tags model",
 * @OA\Property(
 * property="name",
 * type="string",
 * description="Notes tag",
 * example="Tag 1"
 * ),
 * )
 */
class Tag extends Model
{
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the Tags Map for the tag
     */
    public function tagsmap(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\NotesApp\Infrastructure\Persistence\Eloquent\Models\TagsMap');
    }
}
