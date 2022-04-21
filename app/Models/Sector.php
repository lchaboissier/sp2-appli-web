<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    public function districts()
    {
        return $this->hasMany(Sectordistrict::class);
    }

    public function leader()
    {
        return $this->belongTo(Employee::class,'leaser_id');
    }
}
