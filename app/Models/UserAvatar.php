<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAvatar extends Model
{
    protected $table = 'user_avatar';

    protected $guarded = [];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function avatar(): BelongsTo{
        return $this->belongsTo(Avatar::class, 'avatarId', 'id');
    }
}
