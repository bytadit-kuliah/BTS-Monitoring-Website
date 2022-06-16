<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function btslist(){
        return $this->hasMany(Btslist::class);
    }
    public function kecamatan()
    {
    return $this->belongsTo(Kecamatan::class);
    }
}
