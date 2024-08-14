<?php

namespace App\Models\Standard;

use App\Models\Master\MasterClassCategory;
use App\Models\Subject\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'master_class_category_id',
        'master_price_status_id',
        'actual_price',
        'offer_price',
        'created_by',
        'updated_by'
    ];

    public function subjects(): HasMany {
        return $this->hasMany(Subject::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(MasterClassCategory::class);
    }
}
