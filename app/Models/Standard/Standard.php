<?php

namespace App\Models\Standard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by'
    ];
}
