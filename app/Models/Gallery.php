<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasImage;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $fillable = ['title','image','published_at'];

}
