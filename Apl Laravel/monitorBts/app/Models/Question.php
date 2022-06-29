<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function offeredanswer()
    {
        return $this->hasMany(Offeredanswer::class);
    }

}
