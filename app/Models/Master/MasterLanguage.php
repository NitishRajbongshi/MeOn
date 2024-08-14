<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'language'
    ];
}
