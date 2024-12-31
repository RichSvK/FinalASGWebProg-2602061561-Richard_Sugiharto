<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Avatar extends Model
{
    protected $table = 'avatar';

    protected $guarded = [];

    public function users(): HasMany{
        return $this->hasMany(UserAvatar::class, 'avatarId', 'id');
    }
}
