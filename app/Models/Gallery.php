<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $fillable = ['title','image'];

}
