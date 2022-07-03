<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RPP;
use App\Models\User;

class Jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';

    public function rpp()
    {
        return $this->belongsTo(RPP::class, 'rpp_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
