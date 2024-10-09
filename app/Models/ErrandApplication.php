<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ErrandApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary','user_id','errand_id', 'cv_path'];

    public function errand(): BelongsTo
    {
        return $this->belongsTo(Errand::class);
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
