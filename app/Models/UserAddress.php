<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
