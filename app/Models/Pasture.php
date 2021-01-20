<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasture extends Model
{
    use HasFactory;

    public function cattle()
    {
        return $this->hasMany(Cattle::class,'pasture_id','id');
    }
}
