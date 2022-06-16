<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bts_photo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bts()
    {
        return $this->belongsTo('App\bts', 'bts_id');
    }

}
