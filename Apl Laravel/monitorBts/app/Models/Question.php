<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public function questiontype(){
    //     return $this->belongsTo(Questiontype::class);
    // }
    // many-to-many
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    // public function offeredanswer()
    // {
    //     return $this->belongsToMany(Offeredanswer::class);
    // }
    public function offeredanswer()
    {
        return $this->hasMany(Offeredanswer::class);
    }
    // public function surveyor()
    // {
    //     return $this->belongsToMany(Surveyor::class);
    // }
    // public function user(){
    //     return $this->belongsToMany(User::class);
    // }
}
