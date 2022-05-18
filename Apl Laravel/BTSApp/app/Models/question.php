<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function answer_options(){
        return $this->hasMany(answer_option::class);
    }
    public function survey()
    {
    return $this->belongsTo(survey::class);
    }
}
