<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function villages(){
        return $this->hasMany(village::class);
    }
}
