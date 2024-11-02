<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ErrandApplication extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'expected_salary', 
        'user_id', 
        'errand_id', 
        'cv_path', 
        'customer_id'
    ]; 

    // Define the relationship with the Errand model
    public function errand(): BelongsTo
    {
        return $this->belongsTo(Errand::class);
    }

    // Define the relationship with the User model (applicant)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the User model (customer)
    public function customer(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'customer_id'); // Adjust the foreign key name if necessary
    }
}