<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public function surveyor(){
    //     return $this->belongsTo(Surveyor::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function btslist(){
        return $this->belongsTo(Btslist::class);
    }
}
