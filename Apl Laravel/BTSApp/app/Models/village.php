<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bts(){
        return $this->hasMany(bts::class);
    }
    public function kecamatans()
    {
    return $this->belongsTo(kecamatan::class);
    }

}
