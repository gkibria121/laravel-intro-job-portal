<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected   $fillable =['user_id', 'expected_salary'];
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function job() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
