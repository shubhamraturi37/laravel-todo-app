<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $fillable = ['task','user_id','status'];

    public function usersData(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }




}
