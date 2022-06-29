<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offeredanswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
