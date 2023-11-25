<?php

namespace App\Models\Note;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoteResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'note_id',
        'img_path'
    ];

    public function note(): BelongsTo {
        return $this->belongsTo(Note::class);
    }
}
