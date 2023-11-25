<?php

namespace App\Models\Subject;

use App\Models\Chapter\Chapter;
use App\Models\Standard\Standard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard_id',
        'name',
        'description',
        'created_by',
        'updated_by'
    ];

    public function standard(): BelongsTo {
        return $this->belongsTo(Standard::class);
    }

    public function chapters(): HasMany {
        return $this->hasMany(Chapter::class);
    }
}
