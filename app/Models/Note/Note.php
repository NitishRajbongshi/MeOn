<?php

namespace App\Models\Note;

use App\Models\Chapter\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard_id',
        'subject_id',
        'chapter_id',
        'name',
        'description',
        'created_by',
        'updated_by',
    ];

    public function chapter(): BelongsTo {
        return $this->belongsTo(Chapter::class);
    }

    public function resources(): HasMany {
        return $this->hasMany(NoteResource::class);
    }
}
