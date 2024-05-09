<?php

namespace App\Models\Master;

use App\Models\Standard\Standard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterClassCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category'
    ];

    public function standards() : HasMany {
        return $this->hasMany(Standard::class);
    }
}
