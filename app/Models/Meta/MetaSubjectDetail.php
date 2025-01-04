<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaSubjectDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'standard_id',
        'master_language_id',
        'meta_title',
        'meta_description',
        'keywords',
        'created_by',
        'updated_by'
    ];
}
