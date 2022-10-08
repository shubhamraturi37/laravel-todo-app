<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TodoLabel extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $fillable = ['todo_id','priority','notes','due_date'];

    public function todoLabel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Todo::class,'task_id','id');
    }




}
