<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function edit_bts(){
        return $this->hasMany(edit_bts::class);
    }
    public function edit_surveys(){
        return $this->hasMany(edit_survey::class);
    }


}


