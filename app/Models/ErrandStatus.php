<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrandStatus extends Model
{
    protected $fillable = ['status_name', 'description'];

    public function errands()
    {
        return $this->hasMany(Errand::class);
}
}