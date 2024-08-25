<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPlanMapping extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_id',
        'user_id',
        'master_subscription_plan_id',
        'approve',
        'standard_id',
        'subject_id',
        'chapter_id',
    ];

    public function resources(): HasMany {
        return $this->hasMany(UserPlanPaymentReceipt::class);
    }
}
