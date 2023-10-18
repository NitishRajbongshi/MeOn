<?php

namespace App\Models\Subject;

use App\Models\Standard\Standard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
