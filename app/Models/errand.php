<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;


class errand extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'location',
        'phone number',
        'salary',
        'description',
        'experience',
         'category'
    ];
    public static array $experience = ['entry','intermediate','senior'];
    public static array $category = [ 'Basic errand',
    'specialized errands',
    'concierge services',];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function errandApplication(): HasMany
    {
      return  $this->HasMany(ErrandApplication::class);  
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool
    {
        return $this->where('id', $this->id)
        ->whereHas('errandApplication',
        fn($query) => $query->where('user_id', '=', $user->id ?? $user)
    )->exists();
    }
   
    public function scopeFilter( Builder | QueryBuilder $query, array $filters)
{
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('customer', function ($query) use ($search) {
                        $query->where('customer_name', 'like', '%' . $search . '%');
                    });
            });
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
}

