<?php

namespace App\Models\Chapter;

use App\Models\Note\Note;
use App\Models\Subject\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard_id',
        'subject_id',
        'name',
        'description',
        'master_price_status_id',
        'actual_price',
        'offer_price',
        'created_by',
        'updated_by',
        'chapter_no',
    ];

    public function subject(): BelongsTo {
        return $this->belongsTo(Subject::class);
    }

    public function notes(): HasMany {
        return $this->hasMany(Note::class);
    }
}
