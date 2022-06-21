<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenPulang extends Model
{
    use HasFactory;

    protected $table = 'absen_pulang';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}