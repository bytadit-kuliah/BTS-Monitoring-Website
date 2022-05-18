<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitoring extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function answers(){
        return $this->hasMany(answer::class);
    }
    public function bts()
    {
    return $this->belongsTo(bts::class);
    }
    public function surveyors()
    {
    return $this->belongsTo(surveyor::class);
    }
}
