<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function answers(){
        return $this->hasMany(answer::class);
    }
    public function monitorings(){
        return $this->hasMany(monitoring::class);
    }
}
