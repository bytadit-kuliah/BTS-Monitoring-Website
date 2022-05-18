<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function answers(){
        return $this->hasMany(answer::class);
    }
    public function edit_surveys(){
        return $this->hasMany(edit_survey::class);
    }
    public function questions(){
        return $this->hasMany(question::class);
    }
}
