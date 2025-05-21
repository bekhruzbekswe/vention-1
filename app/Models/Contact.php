<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'notes','is_blocked', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
