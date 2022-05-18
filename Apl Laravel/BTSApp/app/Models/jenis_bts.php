<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_bts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function bts(){
        return $this->hasMany(bts::class);
    }
}
