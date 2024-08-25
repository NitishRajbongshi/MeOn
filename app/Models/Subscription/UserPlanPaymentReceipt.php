<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanPaymentReceipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_plan_mapping_id',
        'img_path'
    ];
}
