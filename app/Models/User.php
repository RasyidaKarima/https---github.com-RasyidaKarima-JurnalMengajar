<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Jurnal;
use App\Models\RPP;
use App\Models\Absen;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function jurnals()
    {
        return $this->hasMany(Jurnal::class, 'user_id', 'id');
    }

    public function rpp()
    {
        return $this->hasMany(RPP::class, 'user_id', 'id');
    }

    public function absen()
    {
        return $this->hasMany(Absen::class, 'user_id', 'id');
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}