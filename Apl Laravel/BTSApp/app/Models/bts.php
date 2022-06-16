<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bts_photos(){
        // return $this->hasMany(bts_photo::class);
        return $this->hasMany('App\bts_photo', 'bts_id');
    }
    public function jenisBTS()
    {
    return $this->belongsTo(jenis_bts::class);
    }
    public function desa()
    {
    return $this->belongsTo(village::class);
    }
    public function pemilik()
    {
    return $this->belongsTo(owner::class);
    }
    // public function edit_bts(){
    //     return $this->hasMany(edit_bts::class);
    // }
    public function monitorings(){
        return $this->hasMany(monitoring::class);
    }
}
