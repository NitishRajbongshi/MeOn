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
        'slug',
        'description',
        'tags',
        'master_language_id',
        'master_price_status_id',
        'actual_price',
        'offer_price',
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
