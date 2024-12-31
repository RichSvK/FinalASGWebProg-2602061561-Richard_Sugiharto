<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    protected $table = 'friend_request';

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function friend(){
        return $this->belongsTo(User::class, 'friendId', 'id');
    }
}
