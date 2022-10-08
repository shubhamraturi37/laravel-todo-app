<?php

namespace App;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function findOrFail(int $id)
    {
        return 1;
    }

public function pendingTodos(): \Illuminate\Database\Eloquent\Relations\HasMany
{
        return $this->hasMany(Todo::class)->with(['todoLabel'])->orderBy('id','DESC')->where('status',1);
}
    public function completedTodos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Todo::class)->with(['todoLabel'])->orderBy('id','DESC')->where('status',0);
    }




}
