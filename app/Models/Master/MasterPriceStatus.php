<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPriceStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'status'
    ];
}
