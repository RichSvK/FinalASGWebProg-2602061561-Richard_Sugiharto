<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friend extends Model
{
    protected $table = 'friend';

    protected $guarded = [];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
